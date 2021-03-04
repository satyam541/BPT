<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Article;
use App\Models\Topic;
use App\Models\Location;
use App\Models\PageDetail;

class SearchController extends Controller
{
    public function search()
    {
        $query                     = request()->q;
        $courses                   = Course::with('topic')->where('name','like','%'.$query.'%')->paginate(20);
        $data['query']             = $query;
        $data['result']            = $courses;
        $data['pageDetail']        = PageDetail::getContent('search');
        $data['popularTopics']     = Topic::has('popular')->with('courses')->get();
        $data['popularCourses']    = Course::has('popular')->get();
        $data['popularLocations']  = Location::has('popular')->get();

        return view('search',$data);
    }
    public function loadCourses(Request $request)
    {
        $term = $request->input('term');
		$terms      = explode(" ",$term);
        $courses    = Course::with('topic')->select('name as value','reference','topic_id','display_order')
                        ->orderBy('topic_id')
                        ->where(function($query)use($terms){
                            foreach($terms as $word)
                            {
                                $query->where('name','like','%'.$word.'%');
                            }
                            return $query;
                        })
                        ->orderBy('display_order')
                        ->distinct()
                        ->get();
        return response()->json($courses);
    }

    public function loadBlogs(Request $request)
    {
        $term       =   $request->input('term');
        $terms      =   explode(" ",$term);
        $blogs      =   Article::select('title as value','reference','type')
                        ->orderBy('title')
                        ->where(function($query)use($terms){
                                foreach($terms as $word)
                                {
                                    $query->where('title','like','%'.$word.'%');
                                }
                            return $query;
                        })
                        ->distinct()->get();
        
        return response()->json($blogs);
    }
}
