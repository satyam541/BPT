<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\Enquiry;
use App\Models\Location;
use App\Models\Order;
use App\Models\Schedule;
use Carbon\Carbon;

class WebsiteDashboardController extends Controller
{
    public function index(){
        $courseData=[];
        $courses = Course::orderBy('display_order','desc')->orderBy('topic_id')->get();
        $data['total_courses']	    =	$courses->count();
        $data['total_enquiries']	=	Enquiry::all()->count();
        $data['total_locations']	=	Location::all()->count();
        $data['total_schedules']	=	Schedule::where('response_date','>',Carbon::now())->get()->count();
        foreach($courses as $course){
          $course_schedule['course_data']    = $course;
          $course_schedule['schedule_count'] = $course->schedule->count();
          $course_schedule['location_count'] =  $course->schedule->groupBy('response_location')->count();
          $courseData[]=$course_schedule;
        }
        $locationCount['1']                     =   Location::where('tier',1)->count();
        $locationCount['2']                     =   Location::where('tier',2)->count();
        $locationCount['3']                     =   Location::where('tier',0)->count();
        $scheduleCount['classroom']             =   Schedule::where('response_date','>',Carbon::now())->where('response_location','!=','virtual')->count();
        $scheduleCount['virtual']               =   Schedule::where('response_date','>',Carbon::now())->where('response_location','virtual')->count();
        $enquiryCount['general']                =   Enquiry::where('type','LIKE',"%general%")->orWhere('type','LIKE','%header%')->count();;
        $enquiryCount['course']                 =   Enquiry::whereNotNull('course')->count();;
        $enquiryCount['onsite']                 =   Enquiry::where('type','LIKE',"%onsite%")->count();
        $enquiryCount['classroom']              =   Enquiry::whereNotNull('location')->where('location','!=','Virtual')->count();
        $enquiryCount['virtual']                =   Enquiry::where('location','Virtual')->count();
        $enquiryCount['vacancy']                =   Enquiry::where('type','LIKE',"%career%")->count();
        $enquiryCount['location']               =   Enquiry::where('type','like','%location%')->count();
        $count['location']                      =   $locationCount;
        $count['schedule']                      =   $scheduleCount;
        $count['enquiry']                       =   $enquiryCount;
       $data['count'] = $count;
    //    dd($count);
       $data['courses']= collect($courseData);
        // dd($data);
        return view("cms.websiteContent.websiteDashboard",$data);
    }


    public function courseDashboard(Course $course){
        $percentage['content']=0;
        $percentage['seo']=0;
        $percentage['schedule']=0;
        //content analystic
        $content['overview'] = isset($course->content->first()->overview);
        $content['outline'] =  isset($course->content->first()->outline);
        $content['bullet_list'] = isset($course->content->first()->overview_bullet_list);
        $content['whats_included'] =  isset($course->content->first()->whats_included) ;
        $per= 100/count($content);
       // $content['faq'] =  $course->faq;
        foreach($content as $con){
            if($con){
                $percentage['content'] +=$per;
            }
        }
       //seo analyistic 
        $seo['meta_title'] =  isset($course->content->first()->meta_title);
        $seo['meta_description'] =  isset($course->content->first()->meta_description);
        $seo['meta_keyword'] =  isset($course->content->first()->meta_keywordsmeta_keywords);
        $per= 100/count($seo);
        foreach($seo as $con){
            if($con){
                $percentage['seo'] +=$per;
            }
        }
        

        $data['content'] = $content;
        $data['seo'] = $seo;
        $data['percentage'] = $percentage;
        
        //schedules
    $schedule['classroom'] = $course->schedule->count() > 0;
    $schedule['online'] = isset($course->onlinePrice);
    $schedule['virtual'] = count($course->schedule->where('response_location','Virtual')) > 0 ? true : false;
    $per= 100/count($schedule);
    foreach($schedule as $con){
        if($con){
            $percentage['schedule'] +=$per;
        }
    }
    $data['schedule'] = $schedule;
    $data['percentage'] = $percentage;
    $dates = $course->schedule->groupBy('response_location');

    $data['dates'] = $dates;
    $data['course'] = $course;
    return view("cms.websiteContent.courseDashboard",$data);

    }
}
