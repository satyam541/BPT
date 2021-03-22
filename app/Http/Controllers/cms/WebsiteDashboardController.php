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
    public function index()
    {
        $courseData                 =    array();
       
        $courses                    =    Course::with('schedule:id,course_id,response_location')->select('id','name','display_order','topic_id', 'reference')->orderBy('display_order', 'desc')->orderBy('topic_id')->get();
        $data['total_courses']      =    $courses->count();
        $data['total_enquiries']    =    Enquiry::where('country_id', country()->country_code)->count();
        $data['total_locations']    =    Location::where('country_id', country()->country_code)->count();
        $data['total_schedules']    =    Schedule::where('response_date', '>', Carbon::now())->where('country_id', country()->country_code)->count();
        foreach ($courses as $course) {
            $course_schedule['course_data']    = $course;
            $course_schedule['schedule_count'] = $course->schedule->count();
            $course_schedule['location_count'] =  $course->schedule->groupBy('response_location')->count();
            $courseData[] = $course_schedule;
        }
        
       

        $data['courses'] = collect($courseData);
        return view("cms.websiteContent.websiteDashboard", $data);
    }


    public function courseDashboard(Course $course)
    {
        $course = $course->load('content', 'schedule');
        $percentage['content'] = 0;
        $percentage['seo'] = 0;
        $percentage['schedule'] = 0;
        //content analystic
        $content['overview'] = isset($course->content->first()->overview);
        $content['outline'] =  isset($course->content->first()->outline);
        $content['bullet_list'] = isset($course->content->first()->overview_bullet_list);
        $content['whats_included'] =  isset($course->content->first()->whats_included);
        $per = 100 / count($content);
        // $content['faq'] =  $course->faq;
        foreach ($content as $con) {
            if ($con) {
                $percentage['content'] += $per;
            }
        }
        //seo analyistic 
        $seo['meta_title'] =  isset($course->content->first()->meta_title);
        $seo['meta_description'] =  isset($course->content->first()->meta_description);
        $seo['meta_keyword'] =  isset($course->content->first()->meta_keywords);
        $per = 100 / count($seo);
        foreach ($seo as $con) {
            if ($con) {
                $percentage['seo'] += $per;
            }
        }


        $data['content'] = $content;
        $data['seo'] = $seo;
        $data['percentage'] = $percentage;

        //schedules
        $schedule['classroom'] = $course->schedule->count() > 0;
        $schedule['online'] = isset($course->onlinePrice);
        $schedule['virtual'] = count($course->schedule->where('response_location', 'Virtual')) > 0 ? true : false;
        $per = 100 / count($schedule);
        foreach ($schedule as $con) {
            if ($con) {
                $percentage['schedule'] += $per;
            }
        }
        $data['schedule'] = $schedule;
        $data['percentage'] = $percentage;
        $dates = $course->schedule()->orderBy('response_date')->get()->groupBy('response_location');

        $data['dates'] = $dates;
        $data['course'] = $course;
        // dd($data);
        return view("cms.websiteContent.courseDashboard", $data);
    }
}
