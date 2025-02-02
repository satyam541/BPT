<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Location;
use App\Models\PageDetail;
use App\Models\Schedule;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {   $data['pageDetail']     = PageDetail::getContent('course');
        $schedule               =   Schedule::query();
        $data['selectedMonth'] = null;
        $month = null;
        if($request->has('month'))
         {
            $month= $request->month;
            $data['selectedMonth']=$month;
         }
       

        $course         = Course::with('topic:name,id,reference','countryContent','faqs','whatsIncluded')->where('reference',$request->category.'/'.$request->topic.'/'.$request->course)->first();
        
        if(empty($course))
        {
            return redirect()->route('catalogue');
        }
        $course->loadContent(); 
        if(!empty($course))
        {
            $meta['description'] =  $course->meta_description;
            $meta['keyword']    =   $course->meta_keywords; 
            $meta['title']      =   $course->meta_title; 
            metaData($meta);
        }
        $data['relatedCourses']     = Course::where('topic_id', $course->topic_id)->where('id', '<>', $course->id)->select('name', 'reference')->get(); 
        $data['popularLocations']    = Location::has('popular')->select('name', 'reference')->orderBy('tier')->orderBy('display_order')->get(); 
        $course_id = $course->id;

        if($request->course)
        {
            $schedule = $schedule->where('response_course_name',$course->tka_name)->where('response_date','>',Carbon::today());
        }
        if($request->location)
        {
            $location=$request->location;
            $location = Location::where("reference","LIKE","%{$location}%")->first();
            $schedule = $schedule->where('response_location',$location->name);
        }

        $data['selectedlocation']   = $request->location;
        $data['selectedCourse']     = $course;
        $data['courses']            = Course::orderBy('topic_id')->get();
        $locations                  = Location::all();
        $data['locations']          = $locations;    
        $locationNames              = $locations->pluck('name')->toArray();
        $locationOrderString        = '"'.implode('","',$locationNames).'"';
        $data['schedules']          = $schedule->where('country_id', country()->id)
                                        ->where('response_location','!=','Virtual')->where('course_id', $course_id)
                                        ->whereDate('response_date','>=',Carbon::today())
                                        ->orderBy('response_date')
                                        ->orderByRaw("Field(response_location,".$locationOrderString.")")
                                        ->paginate(5,['*'],'classroom-page');

        $data['virtualSchedules']   = Schedule::where('country_id', country()->id)
                                        ->where('response_location','Virtual')
                                        ->where('course_id',$course_id)
                                        ->whereDate('response_date','>=',Carbon::today())->orderBy('response_date')
                                        ->paginate(5,['*'],'virtual-page');

        $topicCourses               = $course->topic->courses->pluck('id')->toArray();
        $onlineCourses              = Course::whereNotIn('id',$topicCourses)->get()->pluck('course_id')->toArray();
        $onlineCourses              = '"'.implode('","',$onlineCourses).'"';
        $topicCourses               = '"'.implode('","',$topicCourses).'"';
        $finalCourseOrder           = $topicCourses.",".$onlineCourses;
        $data['onlineSchedules']    = Course::has('onlinePrice')->with('onlinePrice', 'courseAddon')
                                        ->where('id',$course_id)
                                        ->orderByRaw("Field(id,".$finalCourseOrder.")")->first();
        
        return view('courses', $data);
    }

    public function filter(Request $request)
    {
        $hash = null;
        if($request->has("deliveryMethod"))
        {
            $hash = $request->deliveryMethod;
        }
        if(empty($request->course))
        {
            return redirect()->back();
        }
        $courseobj=Course::find($request->course);
        $location=$request->location;
        $url = "";
        if(empty($location))
        {
            $url = $courseobj->url;
        }
        if(!empty($location) && !empty($courseobj))
        {

            $locationObj = Location::where("reference",$location)->first();
            $url = $courseobj->url.'/'.$locationObj->reference;
            if($request->has("deliveryMethod"))
            {
                $hash = $request->deliveryMethod;
            }
            else{
                $hash = '#classroom-booking';
            }
            
        }
        
        $url = $url.$hash;
        // if(!empty($hash) && $hash == "#online-booking" && $courseobj->is_online == 1)
        // {
        //     $url = route("onlineCourseRoute",['course'=>$courseobj->elearningCourse->reference]);
        // }
        return redirect($url);
    }
}
