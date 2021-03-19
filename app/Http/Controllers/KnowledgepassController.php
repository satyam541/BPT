<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
class KnowledgepassController extends Controller
{
    
    public function index()
    {

        // $data['topics']=Topic::has('courses')->with('courses.schedule')->get();
      
        // $data['topics']=Topic::withoutGlobalScopes()
        //                 ->join('course', 'course.topic_id', '=', 'topic.id')
        //                 ->join('schedule', 'course.id', '=', 'schedule.course_id')
        //                 ->selectRaw('topic.name as topic_name, course.name as course_name, schedule.event_price as event_price, schedule.country_id as country_id')
        //                 // ->whereRaw('schedule.country_id', country()->country_code)
        //                 // ->havingRaw('MAX(event_price)')
        //                 ->groupBy('topic_name')
        //                 ->get();
        //                 // ->max('event_price');
        // // $data['topics']=Topic::has('courses')->leftJoin('course', 'topic.id', '=','course.topic_id')->select('topic.name','course.name');
        // // ->get();
      
        
        return view('knowledge-pass');

    }
}
