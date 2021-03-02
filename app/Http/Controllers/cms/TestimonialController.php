<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Models\Testimonial;
use Carbon\Carbon;
use App\Http\Requests\cms\TestimonialRequest;

class TestimonialController extends Controller
{

    private $Image_prefix;
    public function __construct()
    {
        $this->Image_prefix = "testimonialImage";
	
    }

    public function testimonialList(Request $request)
    {
        $this->authorize('view', new Testimonial());
        // dd(country());
        $data['testimonials'] = Testimonial::all();
         
        return view('cms.testimonial.testimonial',$data);
    }

    public function create()
    {
        $this->authorize('create', new Testimonial());
        $data['testimonial'] = new Testimonial();
        $data['submitRoute'] = "insertTestimonial";
        return view('cms.testimonial.testimonialForm',$data);
    }

    public function insert(TestimonialRequest $request)
    {
        $this->authorize('create', new Testimonial());
        $testimonial=new Testimonial();
        $testimonial->author        = $request->author;
        $testimonial->location      = $request->location;
        $testimonial->title         = $request->title;
        $testimonial->designation   = $request->designation;
        $testimonial->content       = $request->content;
        $testimonial->post_date     = $request->post_date;
        $testimonial->rating        = $request->rating;
        
    
        if($request->hasFile('image')){
            $imageName = $request->author.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($testimonial->image_path), $imageName);
            $testimonial->image = $imageName;
        }
        
        $testimonial->save();
        
        return redirect()->route('testimonialList')->with('success','Successfully Added');
    }
    
    public function edit(Testimonial $testimonial)
    {
        $this->authorize('update', $testimonial);
        $data['testimonial'] = $testimonial;
        $data['submitRoute'] = array('updateTestimonial',$testimonial->id);
     
        return view("cms.testimonial.testimonialForm",$data);
    }

   public function update(Testimonial $testimonial,TestimonialRequest $request)
   {
        $this->authorize('update', $testimonial);
        $testimonial->author        = $request->author;
        $testimonial->location      = $request->location;
        $testimonial->title         = $request->title;
        $testimonial->designation   = $request->designation;
        $testimonial->content       = $request->content;
        $testimonial->post_date     = $request->post_date;
        $testimonial->rating        = $request->rating;

       
       if($request->hasFile('image')){
           $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
           $request->file('image')->move(public_path($testimonial->image_path), $imageName);
           $testimonial->image = $imageName;
       }
       if($request['removeimagetxt']!=null)
        {
            $testimonial->image = null;
        }
       $testimonial->save();
       return redirect()->route('testimonialList')->with('success','Successfully Updated');
   }

   public function delete(Testimonial $testimonial)
   {
        $this->authorize('delete', $testimonial);
       $testimonial->delete();
   }

       
   public function testimonialtrashList()
   {
        $this->authorize('view', new Testimonial());
        $data['trashedTestimonials'] = Testimonial::onlyTrashed()->get();
    
        return  view('cms.trashed.testimonialTrashedList',$data);
       
   }

   public function restoreTestimonial($id)
   {
        $this->authorize('restore', new Testimonial());
        $testimonial = Testimonial::onlyTrashed()->find($id)->restore();
 
       return back()->with('success','Successfully Restored');

   }
   public function forceDeleteTestimonial($id)
   {
        $this->authorize('forceDelete', new Testimonial());
        $testimonial = Testimonial::onlyTrashed()->find($id)->forceDelete();
 
       return back()->with('success','Permanently Deleted');

   }
   
}
