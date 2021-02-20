<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\CourseElearning;
use App\Models\CourseAddon;
use App\Models\Course;


class OnlineCourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $Video_prefix;

    public function __construct()
    {
        $this->Video_prefix = "Video";
        $this->Image_prefix = "onlinecourseImage";
		// $this->middleware('access:role,insert')->only('insertRole');
    }

    public function list(Request $request)
    {
        $this->authorize('view',new CourseElearning());

        $onlineCourses = Course::where('is_online',1)->get();
        return view('cms.onlinecourse.onlinecourse',compact('onlineCourses'));
    }
  public function courseAddonForm(Course $course){
    $data['courseAddons']=CourseAddon::all();
    $data['model']=$course;
    $data['submitRoute']='courseAddonAssigned';
    return view('cms.addon.courseAddonForm',$data);
  }
public function courseAddonassigned(Request $request){
    // $course
}

    
    public function delete(Course $course)
    {
        $this->authorize('delete', $course);
        $course->is_online=0;
        $course->save();
    }
    

    //save file
    
 
    public function trashList()
    {
        $this->authorize('view', new CourseElearning());
        $data['trashOnlineCourses'] = courseElearning::onlyTrashed()->get();
        return view('cms.trashed.onlineCourseTrashList',$data);
    }

    public function restore($id)
    {
        $this->authorize('restore', new CourseElearning());
        $data = courseElearning::onlyTrashed()->find($id)->restore();
        return back()->with('success','Successfully Restored');
    }


}