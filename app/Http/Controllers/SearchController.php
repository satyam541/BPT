<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Article;

class SearchController extends Controller
{
    public function search()
    {
        $query = request()->q;
        $courses = Course::with('topic')->where('name','like','%'.$query.'%')->get();
        $data['query'] = $query;
        $data['result'] = $courses;
        return view('enquiry',$data);
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
                        ->where('name', 'not like','%Evening%')
                        ->where('name', 'not like','%Weekend%')
                        ->where('name', 'not like','%Residential%')
                        ->orderBy('display_order')
                        ->distinct()
                        ->get();

            // $courses = Course::where('name','like','%'.$terms.'%') ->distinct() ->get();
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
