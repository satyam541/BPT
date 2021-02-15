<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\cms\PageDetailRequest;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\PageDetail;
//use App\Models\Country;

class PageDetailController extends Controller
{
    

    public function __construct()
    {
		// $this->middleware('access:role,insert')->only('insertRole');
    }

    public function list(Request $request)
    {
        $this->authorize('view', new PageDetail());
        $filter = $request->all();
        $data['selectedPageName'] = empty($filter['page_name'])? NULL : $filter['page_name'];
        if(!empty($filter))
        {
            $query = PageDetail::query();
            $query = empty($filter['page_name'])? $query : $query->where('page_name',$filter['page_name']);
            // $query = empty($filter['country'])? $query : $query->where('country_id',$filter['country']);
            $result = $query->paginate(10);
        }
        else{
            $result = PageDetail::paginate(10);
        }
        $list['pages'] = PageDetail::all()->pluck('page_name','id')->unique()->toArray();
        // $list['countries'] = Country::all()->pluck('name','name')->toArray();
        
        $data['pageDetails'] = $result;
        return view('cms.pageDetail.pageDetails',$data);
    }

    public function create()
    {
        // $this->authorize('create', new Pagedetail());
        $data['pageDetail'] = new PageDetail();
        $data['pages'] = PageDetail::pluck('page_name','id')->unique()->toArray();
        $data['submitRoute'] = "insertPageDetail";
        return view('cms.pageDetail.pageDetailForm',$data);
    }

    public function insert(PageDetailRequest $request)
    {
        $this->authorize('create', new Pagedetail());
        $inputs = $request->except(["_token",'image']);
        $pageDetail = pageDetail::firstOrNew(
            [
                "page_name"     => $inputs['page_name'],
                "section"       => $inputs['section'],
                "sub_section"   => $inputs['sub_section'],
                "image_alt"        => $inputs['image_alt']
            ],
            $inputs
        );
     
        $image_prefix = $inputs['page_name'];
        if(empty($pageDetail->created_at))
        {
            /* save image file */
            if($request->hasFile('image')){
                $imageName = $image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path($pageDetail->image_path), $imageName);
                $pageDetail->image = $imageName;
            }

            $pageDetail->save();
            \Session::flash('success', 'Page Content Saved!'); 
        }
        else{
            \Session::flash('failure','Duplicate data found!');
        }
        

        return redirect()->back();
    }

    public function edit(PageDetail $pageDetail)
    {
        $this->authorize('update', $pageDetail);
        $data['pageDetail'] = $pageDetail;
        $data['submitRoute'] = array('updatePageDetail',$pageDetail->id);
        return view("cms.pageDetail.pageDetailForm",$data);
    }

    public function update(PageDetail $pageDetail,PageDetailRequest $request)
    {
        $this->authorize('update', $pageDetail);
        $inputs = $request->except(["_token",'image']);
        $image_prefix = $inputs['page_name'];
         $img_alt  = $request->img_alt;
        if($request->hasFile('image')){
            $imageName = $image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $action = $request->file('image')->move(public_path($pageDetail->image_path), $imageName);
            $inputs["image"] = $imageName;
        }

        try
        {
            $updated = $pageDetail->update($inputs);
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            if(ends_with($ex->errorInfo[2],"for key 'content_set'"))
            {
                $validator = Validator::make([],[]);
                $validator->errors()->add("section",'duplicate entry for similar section');
                throw new \Illuminate\Validation\ValidationException($validator);
            }
            else
            {
                // dd($ex);
            }
        }
        if(!empty($updated))
        {
            \Session::flash('success', 'Page Content updated!'); 
        }
        else
        {
            \Session::flash('failure', 'Error'); 
        }

        return redirect()->back();
    }

    public function delete(PageDetail $pageDetail)
    {
        $this->authorize('delete', $pageDetail);
        $pageDetail->delete();
    }
}