<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PageDetail;
use App\Models\Topic;
use App\Models\Location;
use App\Models\Testimonial;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data['categories']=Category::whereHas('hasPopular')->with('topics','topics.courses')->get();
        $data['topics']=Topic::whereHas('hasPopular')->get()->toArray();
        $data['locations']=Location::whereHas('hasPopular')->take(6)->orderBy('display_order')->get();
        $data['testimonial']=Testimonial::first();
        $data['totalCourses']=null;
        $pageDetail = PageDetail::where(['page_name'=>'home','section'=>'metas'])->get();
        if($pageDetail->isNotEmpty())
        {
            $data['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $data['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $data['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($data);
        }
        $data['pageDetail'] = PageDetail::getContent('home');
        $data['Detail'] = PageDetail::getContent('home');
        return view('home',$data);
    }
}
