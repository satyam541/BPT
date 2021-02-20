<?php

namespace App\Http\Controllers;

use App\Models\PageDetail;
use App\Models\Testimonial;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageDetail = PageDetail::where(['page_name'=>'about-us','section'=>'metas'])->get();
        if(!$pageDetail->isEmpty())
        {
            $meta['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $meta['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $meta['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($meta);
        }
        $data['testimonials'] = Testimonial::limit(6)->get();
        $data['websiteDetail'] = websiteDetail();
        $data['pageDetail'] = PageDetail::getContent('about_us');

        return view('aboutus',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
