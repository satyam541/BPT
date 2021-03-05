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
        $this->authorize('view', new Course());
        $onlineCourses = Course::where('is_online', 1)->get();
        return view('cms.onlinecourse.onlinecourse', compact('onlineCourses'));
    }
    public function courseAddonsList($course)
    {
        $data['onlineCourse'] = Course::with('courseAddon')->find($course);
        
        return view('cms.addon.courseAddonsList', $data);
    }
   
}
