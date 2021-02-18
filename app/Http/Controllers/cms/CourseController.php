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
use App\Models\whatsIncluded;
use App\Models\Accreditation;
use App\Http\Requests\cms\CourseContentRequest;
use App\Http\Requests\cms\BulletPointRequest;
use App\Http\Requests\cms\CourseRequest;
use App\Http\Requests\cms\WhatsIncludedRequest;
use App\Models\WhatsIncluded as ModelsWhatsIncluded;
use App\Models\whatsIncludedHeaders;

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

    public function list(Request $request)
    {
        // $this->authorize('view', new Course());
        $courses = Course::all();

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
        // $this->authorize('view', new Course());
        $filter = $request->all();
        $data['selectedCourse'] = empty($filter['course'])? NULL : $filter['course'];
        $data['selectedCountry'] = empty($filter['country'])? NULL : $filter['country'];
        $query = CourseContent::query();
        $query = empty($filter['course'])? $query : $query->where('course_id',$filter['course']);
        $query = empty($filter['country'])? $query : $query->where('country_id',$filter['country']);
        $query->whereHas('course');
        $result = $query->paginate(10);
        $list['courses'] = Course::all()->pluck('name','id')->toArray();
        $list['countries'] = Country::all()->pluck('name','country_code')->toArray();   
        $data['list'] = $list;
        $data['contents'] = $result;
        return view('cms.course.contents',$data);
    }

    public function bulletPointList(Request $request)
    {

        $data['selectedCourse'] = $request->module_id;
        $data['editbulletpointroute']='editBulletPoint';
        $data['deletebulletpointroute']='deleteBulletPoint';
        $data['insertbulletpointroute']='createBulletPoint';
        $data['type']='course';
        $data['module'] = Course::with('BulletPoint')->find($request->module_id);
        return view('cms.bulletPoints.bulletPoints',$data);
        
    }

    public function createBulletPoint(Request $request)
    {
        $data['result']         = new BulletPoint;
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
        
        return redirect()->route('bulletPointList',['module_id'=>$data['module_id']])->with('success','Operation done!');
        
    }

    public function editBulletPoint($id)
    {
        $data['result']         = BulletPoint::find($id);
        $data['submitRoute']    = ['updateBulletPoint','module'=> $data['result']->module_id];
        return view('cms.bulletPoints.bulletPointForm',$data);
    }

    public function deleteBulletPoint(BulletPoint $courseDetail)
    {
        $courseDetail->delete();
    }

    public function create()
    {

        // $this->authorize('create', new Course());
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
        // $this->authorize('create', new Course());
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
        // $this->authorize('create', new Course());

        $inputs = $request->except(["_token",'is_popular']);
        $inputs['accreditation_id']=$request->accreditation_id;
        $inputs['accredited'] = isset($inputs['accredited']);
        $course = Course::firstOrNew( 
            ['topic_id'=>$inputs['topic_id'],'name'=>$inputs['name']]
        ,$inputs);
        if(!isset($request['is_online'])){
            $course['is_online']=0;
        }
        $reference=$inputs['reference'];
        $course['reference']=$reference;
        if(empty($course->created_at))
        {                    
            if($request->hasFile('image')){
                $imageName = $this->Logo_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path($course->logo_path), $imageName);
                $course->image = $imageName;
            }
            $course->save();
            \Session::flash('success', 'Course created!'); 
        }
        else{
            \Session::flash('failure', 'Duplicate Data Found!'); 
        }
        if($request->has('is_popular'))
        {
            $course->popular()->save($course->popular);
        }

        return redirect()->route('courseList');
    }

    public function contentInsert(CourseContentRequest $request)
    {
        // $this->authorize('create', new Course());
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

    public function edit(Course $course)
    {
        // $this->authorize('update', $course);
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
        // $this->authorize('update', $courseDetail->course);
        $list['courses'] = Course::all()->pluck('name','id')->toArray();
        $list['countries'] = Country::all()->pluck('name','country_code')->toArray();
        $data['list'] = $list;
        $data['courseDetail'] = $courseDetail;
        $data['submitRoute'] = array('updateCourseContent',$courseDetail->id);
        return view('cms.course.contentForm',$data);
    }

    public function update(Course $course,CourseRequest $request)
    {
        // $this->authorize('update', $course);
        $inputs = $request->except(["_token","is_popular"]);
        $inputs['accreditation_id']=$request->accreditation_id;

    
        $inputs['accredited'] = isset($inputs['accredited']);
        $done = $course->update($inputs);
            if(!isset($request['is_online'])){
                $course['is_online']=0;
            }
            $course->save();
        if($request->hasFile('image')){
            $imageName = $this->Logo_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($course->logo_path), $imageName);
            $course->image = $imageName;
            $course->save();
        }
        
        if($request->has('is_popular'))
        {
            $course->popular()->save($course->popular);
        }
        else if($course->isPopular())
        {
            $course->popular->delete();
        }
        
        if(!empty($done))
        \Session::flash('success', 'Course updated!'); 
        return redirect()->route('courseList');
    }

    public function contentUpdate(CourseContentRequest $request,CourseContent $courseDetail)
    {
        // $this->authorize('update', $courseDetail->course);
        $inputs              = $request->except("_token");
        
        $content = $courseDetail->update($inputs);
            if(!empty($content))
        \Session::flash('success', 'Content Updated!'); 

        return redirect()->back();
    }

    public function delete(Course $course)
    {
        // $this->authorize('delete', $course);
        $course->delete();
    }

    public function contentDelete(Request $request,CourseContent $courseDetail)
    {
        // $this->authorize('delete', $courseDetail->course);
        $courseDetail->delete();
    }


   public function coursetrashList()
   {
    $this->authorize('view', new Course());
    $data['trashedCourses'] = Course::onlyTrashed()->get();
    return  view('cms.trashed.courseTrashedList',$data);
       
   }

   public function restoreCourse($id)
   {
<<<<<<< HEAD
        $course= Course::onlyTrashed()->find($id);
   $this->authorize('restore', $course);
=======
        Course::onlyTrashed()->find($id)->restore();
//    $this->authorize('restore', $course);
>>>>>>> 8b9acbce82db4fba2493b2804e3c806ef4337695
   
       return back()->with('success','Successfully Restored');

   }
   public function forceDeleteCourse($id)
   {
        $course = Course::onlyTrashed()->find($id);
   $this->authorize('forceDelete', $course);
       $course->forceDelete();
       return back()->with('success','Permanently Deleted');
   }
   
   public function whatsincludedlist(Request $request)
   {
        $id = $request->module_id;
        // dd($id);
        if(empty($id))
        {
            $url = route('courseList');
            return redirect($url,302);
        }
        $data['module'] = 'Course';
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
        $data['module'] = 'Course';
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