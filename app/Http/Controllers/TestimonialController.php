<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index(){
        $data['testimonials']=Testimonial::all();
        return view('testimonial',$data);
    }
}
