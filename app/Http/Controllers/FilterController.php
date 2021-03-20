<?php
namespace App\Http\Controllers;
use App\Models\Location;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;

class FilterController extends Controller
{
    public function commonFilter(Request $request)
    {
        // dd($request->all());
        
        if (isset($request->course)) {
            $url = Course::find($request->course)->url;
        }
        elseif(isset($request->topic)){
            $url = Topic::find($request->topic)->url;
        }
        elseif(isset($request->category)){
            $url = Category::find($request->category)->url;
        }
        else{
            $url = 'training-courses';
            if(country()->country_code != 'gb')
            {
                $url = country()->country_code."/".$url;
            }  
        }
        
        return redirect($url);
    }

    public function getTopics(Request $request) {
        
        $input  = $request->all();

        $topics = Topic::where('category_id',$input['categoryId'])->get();

        $topicIds= $topics->pluck('id')->toArray();
        $courses = Course::whereIn('topic_id', $topicIds)->get();
 
       $data['topics'] = $topics;
       $data['courses'] = $courses;

       
        return json_encode($data);
    }
    
    public function getCourses(Request $request) {
       
        $input  = $request->all();
        $courses = Course::where('topic_id', $input['topicId'])->get();

        return json_encode($courses);
    }


}
