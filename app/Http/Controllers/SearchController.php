<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Article;
use App\Models\Topic;
use App\Models\Location;
use App\Models\PageDetail;
use App\Models\Popular;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query                     = request()->q;
        $resultQuery               = Course::with('topic')->where('name','like','%'.$query.'%');
        $resultCount               = $resultQuery->count();
        $courses                   = $resultQuery->paginate(20);
        $data['query']             = $query;
        $data['result']            = $courses;
        $data['resultCount']       = $resultCount;
        $data['pageDetail']        = PageDetail::getContent('search');
        $data['popularTopics']     = Topic::has('popular')->with('courses')->get();
        $data['popularCourses']    = Course::has('popular')->get();
        $data['popularLocations']  = Location::has('popular')->get();


        if(!empty($query)){
          
            $terms      = explode(" ", $query);
            $courses    = Course::with('content')
                ->orderBy('topic_id')->orderBy('name')
                ->where('topic_id',"!=",0)
                ->where(function ($query) use ($terms) {
                    foreach ($terms as $word) {
                        $query->where('name', 'like', '%' . $word . '%');
                    }
                    return $query;
                })
                ->distinct()->get();
          $topics    = Topic::with('content')->orderBy('name')
                ->where(function ($query) use ($terms) {
                    foreach ($terms as $word) {
                        $query->where('name', 'like', '%' . $word . '%');
                    }
                    return $query;
                })
                ->distinct()->get();
         $blogs    = Article::orderBy('title')
                ->where(function ($query) use ($terms) {
                    foreach ($terms as $word) {
                        $query->where('title', 'like', '%' . $word . '%');
                    }
                    return $query;
                })
                ->distinct()->get();
                $data['results']= $blogs->merge($topics)->merge($courses);
                               //  $results=$   topics->merge('courses');
                            //    dd($data);
               
                
                
        }

        else
        {
            $courses=Popular::courses()->take(5);
            $blogs=Article::where('type','blog')->get()->take(5);
            $data['results']=$courses->merge($blogs);
           

           

        }
        $data['query'] = $query;
     
        $data['pageDetail'] = PageDetail::getContent('search');
        // $data['categories']=Category::has('article')->get();
        return view('search', $data);
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
