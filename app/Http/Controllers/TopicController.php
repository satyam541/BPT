<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Course;
use App\Models\PageDetail;
use App\Models\Location;
class TopicController extends Controller
{
    public function index($category,$topic){
        $data=[];
        $pageDetail = PageDetail::where(['page_name'=>'topic','section'=>'metas'])->get();
        if($pageDetail->isNotEmpty())
        {
            $data['title']       = $pageDetail->where('sub_section','title')->first()->heading;
            $data['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $data['keyword']     = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($data);
        }
        $data['pageDetail'] = PageDetail::getContent('topic');
        $data['topic']      = Topic::with('topicContent','faqs','Bulletpoint','courses')
                                ->where('reference','/'.$category.'/'.$topic)->first();
        
        $data['otherTopics']= Topic::with('courses')->select('id', 'name', 'reference')
                                ->limit(8)->withCount('courses')->get();
        $data['locations']  = Location::has('popular')->limit(6)->get();

        return view('topic',$data);
    }
}
