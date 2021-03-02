<?php
namespace App\Http\Controllers;
use App\Models\Location;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;

class FilterController extends Controller
{
    public function commonFilter(Request $request)
    {
        $course     =   null;
        $location   =   null;
        $url        =   null;
        // $hash       =   "#virtual-booking";
        if (!empty($request->course)) {
            $course         =   Course::with('topic','elearningCourse')->where('id', $request->course)->first();
        }
        if (!empty($request->location)) {
            $location       =   Location::where("reference", $request->location)->first();
        }
        if(!empty($request->deliveryMethod))
        {
            $hash           =   $request->deliveryMethod;
        }
        if(empty($course)&&empty($location))
        {
            $url = route("homePageRoute");
        }
        if(!empty($course)&&empty($location))
        {
            $url = route("coursePageRoute",['topic'=>$course->topic->reference,'course'=>Str::after($course->reference,'/')]);
        }
        if(empty($course)&&!empty($location))
        {
            $url = route('location',['locName'=>Str::after($location->reference,'/')]);
        }
        if(!empty($course)&&!empty($location))
        {
            $url = route('locationSchedulePageRoute',['topic'=>$course->topic->reference,'course'=>Str::after($course->reference,'/'),'location'=>Str::after($location->reference,'/')]);
        }

        // $url = $url.$hash;

        if(!empty($hash) && $hash == "#online-booking" && !empty($course) && !empty($course->elearningCourse))
        {
            $url = route("onlineCourseRoute",['course'=>$course->elearningCourse->reference]);
        }
        
        return redirect($url);
    }

    public function getTopics(Request $request) {
        
        $input  = $request->all();
        
        if(empty($input['categoryId'])) {
            return ['500' => 'nothing found'];
        }

        $topics = Topic::where('category_id',$input['categoryId'])->get();

        $topicIds= $topics->pluck('id')->toArray();
        $courses = Course::whereIn('topic_id', $topicIds)->get();
 
       $data['topics'] = $topics;
       $data['courses'] = $courses;

       
        return json_encode($data);
    }
    
    public function getCourses(Request $request) {
       
        $input  = $request->all();
       
        if(empty($input['topicId'])) {
            return ['500' => 'nothing found'];
        }
        $courses = Course::where('topic_id', $input['topicId'])->get();

        return json_encode($courses);
    }


}
