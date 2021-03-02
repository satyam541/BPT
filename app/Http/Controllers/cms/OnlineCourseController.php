<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\CourseAddon;
use App\Models\Course;
use App\Models\OnlinePrice;


class OnlineCourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $Video_prefix;

    

    public function list(Request $request)
    {
        $this->authorize('view',new Course());
        $onlineCourses = Course::where('is_online',1)->get();
        return view('cms.onlinecourse.onlinecourse',compact('onlineCourses'));
    }
    public function courseAddonForm($course){
      
     
        $onlinePrice             =   OnlinePrice::where('course_id',$course)->first();
        $data['courseAddons']    =   $onlinePrice->addons;
        $data['onlineprice']     =   $onlinePrice;
  
   
        return view('cms.addon.courseAddonForm',$data);
    }
    public function courseAddonassigned(Request $request){
    $course=Course::find($request->id);
    $course->courseAddon()->sync($request->name);
    $course->save();
    return redirect()->route('onlinecourseList')->with('success','Addons assigned successfully');
    }
    public function delete(Course $course)
    {
        $this->authorize('delete', $course);
        $course->is_online=0;
        $course->courseAddon()->detach();
        $course->save();
    }
    

    //save file
    
 

}