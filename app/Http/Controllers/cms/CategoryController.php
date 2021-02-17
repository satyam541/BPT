<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\cms\BulletPointRequest;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\whatsIncluded;
use App\Models\BulletPoint;
use App\Models\whatsIncludedHeaders;
use App\Http\Requests\cms\CategoryRequest;
use App\Http\Requests\cms\WhatsIncludedRequest;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $Image_prefix;
    private $Icon_prefix;

    public function __construct()
    {
        $this->Image_prefix = "categoryImage";
        $this->Icon_prefix  = "categoryIcon";
		// $this->middleware('access:role,insert')->only('insertRole');
    }

    public function list()
    {
        // $this->authorize('view', new Category());      
        $categories = Category::All();
        return view('cms.category.categoryList',compact('categories'));    
             
    }

    public function create()
    {
        // $this->authorize('create', new Category());
        $data['category']     = new Category();
        $data['submitRoute']  = "insertCategory";
        return view('cms.category.categoryForm',$data);
    }

    public function insert(CategoryRequest $request)
    {
        // $this->authorize('create', new Category());
        $input    = $request->except("_token");
        $category = new Category();
        //$country = Country::updateOrCreate( ['name' => $input['name']], $input );
        $category->name                 = $input['name'];
        $category->tag_line             = $input['tag_line'];
        // $category->display_order        = $input['display_order'];
        $category->reference            = 'training-courses'.'/'.encodeUrlSlug($input['name']);
        $category->color_code           = $input['color_code'];
        $category->published            = isset($input['published']);
        $category->is_online            = isset($input['is_online']);
        $category->is_technical         = isset($input['is_technical']);
        
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($category->image_path), $imageName);
            $category->image = $imageName;
        }

        if($request->hasFile('icon')){
            $imageName = $this->Icon_prefix.Carbon::now()->timestamp.'.'.$request->file('icon')->getClientOriginalExtension();
            $request->file('icon')->move(public_path($category->icon_path), $imageName);
            $category->icon = $imageName;
        }

        $category->save();
        
        return redirect()->route('categoryList')->with('success','Successfully Added');
    }

    public function edit(Category $category)
    {
        $data['category']    = $category;
        $data['submitRoute'] = array('updateCategory',$category->id);
        return view("cms.category.categoryForm",$data);
    }

    public function update(Category $category,CategoryRequest $request)
    {
        $input = $request->all();
        $category->name             = $input['name'];
        $category->tag_line         = $input['tag_line'];
        // $category->display_order    = $input['display_order'];
        $category->reference            = 'training-courses'.'/'.encodeUrlSlug($input['name']);
        $category->color_code       = $input['color_code'];
        $category->published        = isset($input['published']);
        $category->is_online        = isset($input['is_online']);
        $category->is_technical     = isset($input['is_technical']);
   
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($category->image_path), $imageName);
            $category->image = $imageName;
        }

        if($request->hasFile('icon')){
            $imageName = $this->Icon_prefix.Carbon::now()->timestamp.'.'.$request->file('icon')->getClientOriginalExtension();
            $request->file('icon')->move(public_path($category->icon_path), $imageName);
            $category->icon = $imageName;
        }
        
        $category->save();
        
        return redirect()->route('categoryList')->with('success','Successfully Updated');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return back();
    }

    public function bulletPointList(Request $request)
    {
        $data['selectedCourse'] = $request->module;
        $data['editbulletpointroute']='categoryEditBulletPoint';
        $data['deletebulletpointroute']='categoryDeleteBulletPoint';
        $data['insertbulletpointroute']='categoryCreateBulletPoint';
        $data['module'] = Category::with('Bulletpoint')->find($request->module);
        return view('cms.bulletPoints.bulletPoints',$data);
        
    }
    public function createBulletPoint(Request $request)
    {
        $data['result']         = new BulletPoint;
        $data['submitRoute']    = ['categoryInsertBulletPoint','module'=>$request->module];
        return view('cms.bulletPoints.bulletPointForm',$data);
    }
    public function submitBulletPoint(BulletPointRequest $request, $module)
    {
        $input                      = $request->except("_token");
        $data                       = array();
        $data['module_id']          = $module;
        $data['module_type']        = 'category';
        $data['bullet_point_text']  = $input['bullet_point_text'];
        if($input['id']==null){
            $displayOrder=BulletPoint::sortBulletPoint('topic',$request->module);
            $data['display_order']=$displayOrder+1;
        }
        BulletPoint::updateOrCreate(['id' =>$input['id']],$data);
        return redirect()->route('categoryBulletPointList',['module'=>$data['module_id']])->with('success','Operation done!');
        
    }

    public function editBulletPoint($id)
    {
        $data['result']         = BulletPoint::find($id);
        $data['submitRoute']    = ['categoryUpdateBulletPoint','module'=> $data['result']->module_id];
        return view('cms.bulletPoints.bulletPointForm',$data);
    }

    public function deleteBulletPoint(BulletPoint $courseDetail)
    {
        $courseDetail->delete();
    }
    public function whatsincludedlist(Request $request)
   {
        $id = $request->module;
        if(empty($id))
        {
            $url = route('courseList');
            return redirect($url,302);
        }
        $data['result'] = Category::with('whatsIncluded')->find($id);
        $data['module'] = 'Category';
        $data['deletewhatsincludedroute']='categoryDeleteWhatsincluded';
        $data['insertwhatsincludedroute']='categoryCreateWhatsincluded';
        return view('cms.whatsincluded.whatsincluded',$data);
   }

 
   public function whatsincludedcreate(Request $request)
   {
        $category_id = $request->module;
        if(empty($category_id))
        {
            $url = route('courseList');
            return redirect($url,302);
        }
        $categories = Category::all();
        $course = $categories->where('id', $category_id)->first();
        $data['course'] = $course;
        $data['module'] = 'Category';
        $data['list'] = $categories->pluck('name','id')->toArray();
        $data['headings'] =whatsIncludedHeaders::all()->pluck('name','id')->toArray();
        $data['whatsincluded'] = new whatsincluded();
        $data['submitRoute'] = 'categoryInsertWhatsincluded';
     
       return view('cms.whatsincluded.whatsIncludedForm',$data);
   }

   public function sortWhatsIncluded(Request $request){
        $inputs     =   $request->input();
        $sort       =   $inputs['sort'];
        foreach($sort as $index=>$id)
        {
            $whatsincluded = whatsIncluded::find($id);
            $whatsincluded->sequence = $index+1;
            $whatsincluded->save();
        }
        return "success";
   }
   public function whatsincludedinsert(WhatsIncludedRequest $request)
   {
       $category_id = $request->course_id;
       $header_id = $request->header_id;

       Category::find($category_id)->WhatsIncluded()->syncWithoutDetaching([$header_id=>['module_id'=> $category_id, 'module_type' => 'Category']]);

        \Session::flash('success', 'WhatsIncluded Added!'); 
       return redirect()->back();
   }

   public function whatsincludeddelete($course, $whatsincluded)
   { 
        Category::find($course)->WhatsIncluded()->detach($whatsincluded);
    
   }
   public function categorytrashList()
   {
    //  $this->authorize('view', new Category());
     $data['trashedCategories'] = Category::onlyTrashed()->get();
     return  view('cms.trashed.categoryTrashedList',$data);
       
   }

   public function restoreCategory($id)
   {
       $category = Category::onlyTrashed()->where('id',$id)->restore();
       return back()->with('success','Successfully Restored');

   }
   public function forceDeleteCategory($id)
   {
       $category = Category::onlyTrashed()->where('id',$id)->forceDelete();
       return back()->with('success','Permanently Deleted');
   }
}