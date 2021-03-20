<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Course;
use App\Models\PageDetail;
use App\Models\Location;
class TopicController extends Controller
{
    public function index(Request $request){
        $topic      = Topic::with('topicContent','faqs','Bulletpoint','courses')
                                ->where('reference',$request->category.'/'.$request->topic)->first();
        if(empty($topic))
        {
            return redirect()->route('catalogue');
        }
        $topic->loadContent();                       
        if(!empty($topic))
        {
            $data['title']       = $topic->meta_title;
            $data['description'] = $topic->meta_description;
            $data['keyword']     = $topic->meta_keywords; 
            metaData($data);
        }
        $data['pageDetail'] = PageDetail::getContent('topic');
        $data['topic'] = $topic;
        
        $data['otherTopics']= Topic::with('courses')
                                ->has('courses')
                                ->where('category_id', $topic->category_id)
                                ->where('id', '<>', $topic->id)
                                ->select('id', 'name', 'reference')
                                ->limit(8)->withCount('courses')->get();
        $data['locations']  = Location::has('popular')->limit(6)->get();

        return view('topic',$data);
    }
}
