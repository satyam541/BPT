<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\PageDetail;
use App\Models\Topic;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index()
    {
        $pageDetail = PageDetail::where(['page_name'=>'catalogue','section'=>'metas'])->get();
        if($pageDetail->isNotEmpty())
        {
            $data['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $data['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $data['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($data);
        }
        $data['pageDetail'] = PageDetail::getContent('catalogue');

        $categories                 = Category::with('topics')->where('published', 1)->get();
        $data['categoriesList']     = $categories->pluck('name', 'id')->toArray();
        $data['categories']         = $categories; 
        $data['popularTopics']      = Topic::has('popular')->get();
        $data['topics']             = Topic::has('courses')->with('courses')->where('published', 1)->orderBy('display_order')->get();
        $data['popularCourses']     = Course::has('popular')->limit(6)->orderBy('display_order')->get();
        $data['courses']            = Course::select('id', 'name')->pluck('name', 'id');
        return view('catalogue', $data);
    }
}
