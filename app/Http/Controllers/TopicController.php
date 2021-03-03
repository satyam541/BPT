<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\models\Course;
use App\Models\PageDetail;
use App\Models\Location;
class TopicController extends Controller
{
    public function index($category,$topic){
        $data=[];
        $pageDetail = PageDetail::where(['page_name'=>'topic','section'=>'metas'])->get();
        if($pageDetail->isNotEmpty())
        {
            $data['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $data['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $data['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($data);
        }
        $data['pageDetail'] = PageDetail::getContent('topic');
        $topic=Topic::with('topicContent','Bulletpoint')->where('reference','/'.$category.'/'.$topic)->first();
        $data['courses']=Course::has('popular')->with('countryContent','faqs')->where('topic_id',$topic->id)->take(4)->get();
        if($data['courses']->isEmpty() || $data['courses']->count()<4){
            $count=4-$data['courses']->count();
            $data['courses']=$data['courses']->merge(Course::doesnthave('popular')->with('countryContent','faqs')->where('topic_id',$topic->id)->take($count)->get());
        }
        $data['topic']=$topic;
        $data['otherTopics']=Topic::with('courses')->take(8)->get();
        $data['locations']=Location::has('popular')->take(6)->get();

        return view('topic',$data);
    }
}
