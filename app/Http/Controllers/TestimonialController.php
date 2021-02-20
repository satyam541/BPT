<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\PageDetail;
class TestimonialController extends Controller
{
    public function index(){
        $pageDetail = PageDetail::where(['page_name'=>'testimonial','section'=>'metas'])->get();
        if(!$pageDetail->isEmpty())
        {
            $meta['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $meta['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $meta['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($meta);
        }
        $data['pageDetail'] = PageDetail::getContent('testimonial');
        $data['testimonials']=Testimonial::all();
        // dd($data['testimonials']);
        return view('testimonial',$data);
    }
}
