<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Topic;
use App\Models\BulletPoint;
use App\Models\CourseContent;
use App\Models\Country;
use App\Models\WhatsIncluded;
use App\Models\OnlinePrice;
use App\Models\Accreditation;
use App\Http\Requests\cms\CourseContentRequest;
use App\Http\Requests\cms\BulletPointRequest;
use App\Http\Requests\cms\CourseRequest;
use App\Http\Requests\cms\WhatsIncludedRequest;
use App\Http\Requests\cms\CourseFaqRequest;
use App\Models\WhatsIncluded as ModelsWhatsIncluded;
use App\Models\WhatsIncludedHeaders;
class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $Logo_prefix;

    public function __construct()
    {
        $this->Logo_prefix = "Logo";
		// $this->middleware('access:role,insert')->only('insertRole');
    }
    public function selectedCountry(Request $request){
        session(['selectedcountry'=>$request->all()]);
        session()->save();
        return 'done';
    }
    public function popular(Request $request){
        $course=Course::find($request->courseId);
        if($request->checked=='checked'){
            $course->popular->delete();    
            return 'removed';
        }
        $course->popular->save();
        return 'added';
    }
    public function list(Request $request)
    {
        $this->authorize('view', new Course());
        $courses = Course::with('popular')->get();
        
        return view('cms.course.courseList',compact('courses'));
    }

    public function unlinkedCourseList()
    {
        $data['courses']     = Course::with('topic')->whereDoesntHave('topic')->get();
        $data['topics']      = Topic::pluck('name','id');
        return view('cms.course.unlinkedCourses',$data);
    }

    public function linkTopic($id, Request $request)
    {
        $course = Course::find($id);
        $course->topic_id         = $request['topic_id'];
        $topic  = Topic::find($request['topic_id']);
        $course->reference   = $topic->reference.'/'.encodeUrlSlug($course['name']);
        $course->update();
        return back()->with('success','Topic linked');
    }

    public function contentList(Request $request)
    {
        $this->authorize('view', new Course());
        $filter = $request->all();
        $data['selectedCourse'] = empty($filter['course'])? NULL : $filter['course'];
        $data['selectedCountry'] = empty($filter['country'])? NULL : $filter['country'];
        $query = CourseContent::query();
        $query = empty($filter['course'])? $query : $query->where('course_id',$filter['course']);
        $query = $query->where('country_id',country()->country_code);
        $query->whereHas('course');
        $result = $query->paginate(10);
        $data['contents'] = $result;
        return view('cms.course.contents',$data);
    }

    public function bulletPointList(Request $request)
    {
        $data['selectedCourse'] = $request->module;
        $data['editbulletpointroute']='editBulletPoint';
        $data['deletebulletpointroute']='deleteBulletPoint';
        $data['insertbulletpointroute']='createBulletPoint';
        $data['type']='course';
        $data['module'] = Course::with('BulletPoint')->find($request->module);
        
        return view('cms.bulletPoints.bulletPoints',$data);
        
    }

    public function createBulletPoint(Request $request)
    {
        $data['result']         = new BulletPoint;
        $data['type']           = 'course';
        $data['module_id']      = $request->module;
        $data['module']         = Course::find($request->module);
        $data['submitRoute']    = ['insertBulletPoint','module'=>$request->module];
        return view('cms.bulletPoints.bulletPointForm',$data);
    }

    public function submitBulletPoint(BulletPointRequest $request, $module)
    {
        $input                      = $request->except("_token");
        $data                       = array();
        $data['module_id']          = $module;
        $data['module_type']        = 'course';
        $data['bullet_point_text']  = $input['bullet_point_text'];
        BulletPoint::updateOrCreate(['id' =>$input['id']],$data);
        
        return redirect()->route('courseBulletPointList',['module'=>$data['module_id']])->with('success','Operation done!');
        
    }

    public function editBulletPoint($id)
    {
        $data['result']         = BulletPoint::find($id);
        $data['type']           = 'course';
        $data['module_id']      = $data['result']->module_id;
        $data['module']         = Course::find($data['module_id']);
        $data['submitRoute']    = ['updateBulletPoint','module'=> $data['result']->module_id];
        return view('cms.bulletPoints.bulletPointForm',$data);
    }

    public function deleteBulletPoint(BulletPoint $courseDetail)
    {
        $courseDetail->delete();
    }

    public function create()
    {

        $this->authorize('create', new Course());
        $list['topics'] = Topic::all()->pluck('name','id')->toArray();
        $list['slugs'] = Topic::all()->pluck('reference','id')->toArray();
        $list['accreditations'] = Accreditation::all()->pluck('name','id')->toArray();
        $data['list'] = $list;
        $data['course'] = new Course();
        $data['submitRoute'] = 'insertCourse';
        return view('cms.course.courseForm',$data);
    }
    
    public function contentCreate(Request $request)
    {
        $this->authorize('create', new Course());
        $filter = $request->all();
        $selectedCourse = empty($filter['course'])? NULL : $filter['course'];
        $selectedCountry = empty($filter['country'])? NULL : $filter['country'];
        $courseDetail = CourseContent::firstOrNew(array('course_id'=>$selectedCourse,'country_id'=>$selectedCountry));
        $list['courses'] = course::all()->pluck('name','id')->toArray();
        $list['countries'] = Country::all()->pluck('name','country_code')->toArray();
        $data['list'] = $list;
        $data['courseDetail'] = $courseDetail;
        $data['submitRoute'] = 'insertCourseContent';
        return view('cms.course.contentForm',$data);
    }

    public function insert(CourseRequest $request)
    {
        $this->authorize('create', new Course());

        $inputs = $request->except(["_token"]);
        $inputs['accreditation_id']=$request->accreditation_id;
        $inputs['accredited'] = isset($inputs['accredited']);
        $inputs['published'] = isset($inputs['published']);
        $course = Course::firstOrNew( 
            ['topic_id'=>$inputs['topic_id'],'name'=>$inputs['name']]
        ,$inputs);

        $course['is_online'] = isset($inputs['is_online']);
        $topic=Topic::find($inputs['topic_id'])->reference;
        $course['reference'] = $topic.'/'.encodeUrlSlug($inputs['reference']);

        $online = new OnlinePrice();

        if(empty($course->created_at))
        {                    
            if($request->hasFile('image')){
                $imageName = $this->Logo_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path($course->logo_path), $imageName);
                $course->image = $imageName;
            }
            $course->save();
        }
        
        if(isset($inputs['is_popular']))
        {
            $course->popular->save();
        }

        if($request['is_online']){
            $online['course_id']    = $course['id'];
            $online['type']         = 'Online';
            $online['component']    = 'Basic';
            $online['price']        = $inputs['online_price'];
            $online->save();
        }
        

        return redirect()->route('courseList')->with('success','Course Added!');
    }

    public function contentInsert(CourseContentRequest $request)
    {
        $this->authorize('create', new Course());
        $inputs              = $request->except("_token");
      
        $content               = CourseContent::firstOrNew(
            ['course_id'=>$inputs['course_id'],'country_id'=>$inputs['country_id']]
            ,$inputs);
            if(empty($content->created_at))
            {
                $content->save();
                \Session::flash('success', 'Content added!'); 
            }
            else
            {
                \Session::flash('failure', 'Duplicate Data Found!'); 
            }

        return redirect()->back();
    }

    public function edit($course)
    {
        $this->authorize('update', new course());
        $course = Course::with('popular','onlinePrice')->find($course);
        $list['topics'] = Topic::all()->pluck('name','id')->toArray();
        $list['slugs'] = Topic::all()->pluck('reference','id')->toArray();
        $list['accreditations'] = Accreditation::all()->pluck('name','id')->toArray();
        $data['list'] = $list;
        $data['submitRoute'] = array('updateCourse',$course->id);
        $data['course'] = $course;
        return view("cms.course.courseForm",$data);
    }

    public function contentEdit(Request $request,CourseContent $courseDetail)
    {
        $this->authorize('update', $courseDetail->course);
        $list['courses'] = Course::all()->pluck('name','id')->toArray();
        $list['countries'] = Country::all()->pluck('name','country_code')->toArray();
        $data['list'] = $list;
        $data['courseDetail'] = $courseDetail;
        $data['submitRoute'] = array('updateCourseContent',$courseDetail->id);
        return view('cms.course.contentForm',$data);
    }

    public function update(Course $course ,CourseRequest $request)
    {
        $this->authorize('update', new course());
        $inputs = $request->except("_token");
        $inputs['accreditation_id']=$request->accreditation_id;
        
        $inputs['accredited'] = isset($inputs['accredited']);
        $inputs['published']  = isset($inputs['published']);
        $inputs['is_online']  = isset($inputs['is_online']);
        $topic=Topic::find($inputs['topic_id'])->reference;
        $inputs['reference']  = $topic.'/'.encodeUrlSlug($inputs['reference']);
        $course->update($inputs);
        $online = array();

        if($request->hasFile('image')){
            $imageName = $this->Logo_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($course->logo_path), $imageName);
            $course->image = $imageName;
            $course->save();
        }
        if($inputs['removeimagetxt']!=null)
        {
            $course->image = null;
            $course->save(); 
        }
        if(isset($inputs['is_popular']))
        {
            $course->popular->save();
        }
        else
        {
            $course->popular->delete();
        }

        if($request['is_online']){
            $online['course_id']    = $course['id'];
            $online['type']         = 'Online';
            $online['component']    = 'Basic';
            $online['price']        = $inputs['online_price'];
            OnlinePrice::updateOrCreate(['id' =>$request['online_id']],$online);
        }
        elseif($request['online_id']){
            $course->onlinePrice->delete();
        }
                
        return redirect()->route('courseList')->with('success','Course Updated!');
    }

    public function contentUpdate(CourseContentRequest $request,CourseContent $courseDetail)
    {
        $this->authorize('update', $courseDetail->course);
        $inputs              = $request->except("_token");
        
        $content = $courseDetail->update($inputs);
            if(!empty($content))
        \Session::flash('success', 'Content Updated!'); 

        return redirect()->back();
    }

    public function delete(Course $course)
    {
        // $this->authorize('delete', $course);
        // if($course['is_online'])
        // {
        //     $course['is_online'] = 
        // }
        $course->delete();
    }

    public function contentDelete(Request $request,CourseContent $courseDetail)
    {
        $this->authorize('delete', $courseDetail->course);
        $courseDetail->delete();
    }


   public function coursetrashList()
   {
    $this->authorize('view', new Course());
    $data['trashedCourses'] = Course::onlyTrashed()->get();
    return  view('cms.trashed.courseTrashedList',$data);
       
   }
   public function addonList(){

   }
   public function restoreCourse($id)
   {
        $course= Course::onlyTrashed()->find($id);
        $this->authorize('restore', $course);
        $course->myRestore();
        return back()->with('success','Successfully Restored');

   }
   public function forceDeleteCourse($id)
   {
        $course = Course::onlyTrashed()->find($id);
        $this->authorize('forceDelete', $course);
        $course->myforceDelete();
        return back()->with('success','Permanently Deleted');
   }
   public function courseContentTrash()
   {
        $data['courseContent'] = CourseContent::with(['course'=>function($query){
            $query->withTrashed();
        }])->onlyTrashed()->where('country_id',country()->country_code)->get();

       return view('cms.trashed.courseContentTrashList',$data);
   }
   public function restoreCourseContent($id)
   {
       CourseContent::where('id',$id)->restore();
       return back()->with('success','Successfully Restored');
   }
   public function forceDeleteCourseContent($id)
   {
       CourseContent::where('id',$id)->forceDelete();
       return back()->with('success','Permanently Deleted');
   }

   public function whatsincludedlist(Request $request)
   {
        $id = $request->module;
        // dd($id);
        if(empty($id))
        {
            $url = route('courseList');
            return redirect($url,302);
        }
        $data['module'] = 'course';
        $data['result'] = course::with('whatsIncluded')->find($id);
        $data['deletewhatsincludedroute']='deletewhatsincluded';
        $data['insertwhatsincludedroute']='createwhatsincluded';
        return view('cms.whatsincluded.whatsincluded',$data);
   }

 
   public function whatsincludedcreate(Request $request)
   {
        $course_id = $request->module;
        if(empty($course_id))
        {
            $url = route('courseList');
            return redirect($url,302);
        }
        $courses = Course::all();
        $course = $courses->where('id', $course_id)->first();
        $data['course'] = $course;
        $data['module'] = 'course';
        $data['list'] = $courses->pluck('name','id')->toArray();
        $data['headings'] =whatsIncludedHeaders::all()->pluck('name','id')->toArray();
        $data['whatsincluded'] = new whatsincluded();
        $data['submitRoute'] = 'insertwhatsincluded';
     
       return view('cms.whatsincluded.whatsIncludedForm',$data);
   }

   public function sortWhatsIncluded(Request $request){
        $inputs     =   $request->input();
        // dd($inputs);
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
       $course_id = $request->course_id;
       $header_id = $request->header_id;
       Course::find($course_id)->WhatsIncluded()->syncWithoutDetaching([$header_id=>['module_id'=> $course_id, 'module_type' => 'Course']]);

        \Session::flash('success', 'WhatsIncluded Added!'); 
       return redirect()->back();
   }

   public function whatsincludeddelete($course, $whatsincluded)
   { 
        Course::find($course)->WhatsIncluded()->detach($whatsincluded);
    
   }
}