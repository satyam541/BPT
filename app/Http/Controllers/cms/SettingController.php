<?php

namespace App\Http\Controllers\cms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\WebsiteDetail;
use App\Http\Requests\cms\WebsiteDetailRequest;

class SettingController extends Controller
{
  
    private $Logo_prefix;

    public function __construct()
    {
        $this->Logo_prefix = "Logo";
		
    }

    public function websiteDetailList()
    {
        $this->authorize('view', new WebsiteDetail());
        $data['websitedetails'] = WebsiteDetail::paginate(10);
      
        return view('cms.websiteContent.websiteDetail',$data);
    }
    public function createWebsiteDetail()
    {
        $this->authorize('create', new WebsiteDetail());
        $data['websitedetail'] = new WebsiteDetail();
         $data['submitRoute'] = "insertWebsiteDetail";
        //  $data['websites'] = Website::all()->pluck('name','id')->toArray();
         $data['countries'] = Country::all()->pluck('name','country_code')->toArray();
        return view('cms.websiteContent.websiteDetailform',$data);
    }
 

    public function insertWebsiteDetail(WebsitedetailRequest $request)
    {
        
        $this->authorize('create', new WebsiteDetail());
        
        $websitedetail=new WebsiteDetail();
        // $websitedetail->web_id         = $request->website;
        $websitedetail->country_id         = $request->country_id;
        $websitedetail->address            = $request->address;
        $websitedetail->contact_number     = $request->contact_number;
        $websitedetail->name               = $request->name;
        $websitedetail->contact_email      = $request->contact_email ;

        $websitedetail->contact_footer     = $request->contact_footer ;

        $websitedetail->copyright_footer   = $request->copyright_footer;
        $websitedetail->opening_hours      = $request->opening_hours;
        $websitedetail->opening_days       = $request  ->opening_days;
        $websitedetail->twitter            = $request->twitter;
        $websitedetail->facebook           = $request->facebook;
        $websitedetail->linkedin           = $request->linkedin;
        $websitedetail->courses            = $request->courses;
        $websitedetail->trainers           = $request->trainers;
        $websitedetail->reviews            = $request->reviews;
        $websitedetail->learners           = $request->learners;
        $websitedetail->locations          = $request->locations;
        if($request->hasFile('image')){
            $imageName = $this->Logo_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($websitedetail->logo_path), $imageName);
            $websitedetail->image = $imageName;
        }
       
        $websitedetail->save();
        return redirect()->route('websiteDetailList')->with('success','Successfully Added');

    }
    public function  editWebsiteDetail(WebsiteDetail $websitedetail)
    {
        $this->authorize('update', $websitedetail);
        $data['websitedetail'] = $websitedetail;
        
        // $data['websites'] = Website::all()->pluck('name','id')->toArray();
        $data['countries'] = Country::all()->pluck('name','country_code')->toArray();
       $data['submitRoute'] = array('updateWebsiteDetail',$websitedetail->id);
      
        return view("cms.websiteContent.websiteDetailform",$data);
    }

    public function deleteWebsiteDetail(WebsiteDetail $websitedetail)
    {
        $this->authorize('delete',$websitedetail);
      $websitedetail->delete();

    }

    
    public function updateWebsiteDetail(WebsiteDetail $websitedetail,WebsiteDetailRequest $request)
    {
        
        $this->authorize('update', $websitedetail);
        // $websitedetail->web_id             = $request->website;
        $websitedetail->country_id         = $request->country_id;
        $websitedetail->contact_number     = $request->contact_number;
        $websitedetail->address            = $request->address;
        $websitedetail->contact_email      = $request->contact_email ;
        $websitedetail->contact_footer     = $request->contact_footer ;
        $websitedetail->copyright_footer   = $request->copyright_footer;
        $websitedetail->opening_hours       = $request->opening_hours;
        // $websitedetail->name                = $request->name;
        $websitedetail->opening_days       = $request  ->opening_days;
        $websitedetail->twitter            =$request->twitter;
        $websitedetail->facebook           =$request->facebook;
        $websitedetail->linkedin            =$request->linkedin;
        $websitedetail->courses           =$request->courses;
        $websitedetail->trainers           =$request->trainers;
        $websitedetail->reviews           =$request->reviews;
        $websitedetail->learners            =$request->learners;
        $websitedetail->locations            =$request->locations;
        if($request->hasFile('image')){
            $imageName = $this->Logo_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($websitedetail->logo_path), $imageName);
            $websitedetail->image = $imageName;
        }
        $websitedetail->save();
        return redirect()->route('websiteDetailList')->with('success','Successfully Added');
      
        // return back()->with('success','Successfully Updated');
    }
    public function trashList()
    {
        $data['trashedWebsiteDetail'] = WebsiteDetail::onlyTrashed()->get();
        return view('cms.trashed.websiteDetailTrashedList',$data);
    }

    public function restore($id)
    {
        WebsiteDetail::onlyTrashed()->find($id)->restore();
        return back()->with('success','Successfully Restored');
    }

    public function forceDelete($id)
    {
        WebsiteDetail::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success','Permanently Deleted');
    }
}
