<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Carbon\Carbon;
use App\Http\Requests\cms\SocialMediaRequest;

class SocialMediaController extends Controller
{
    private $Image_prefix;
   

    public function __construct()
    {
        $this->Image_prefix = "socialmediaImage";
    	
    }
    
    public function socialList()
    {
        // $this->authorize('view', new SocialMedia());
        $data['socialmedias'] = SocialMedia::all();   
        return view('cms.socialmedia.socialmedia',$data);
    }
    public function create()
    {
        // $this->authorize('create', new SocialMedia());
        $data['socialmedia'] = new SocialMedia();
         $data['submitRoute'] = "insertsocialmedia";
       
        return view('cms.socialmedia.socialmediaForm',$data);
    }
 

    public function insert(SocialMediaRequest $request)
    {
        // $this->authorize('create', new SocialMedia());
        
        $socialmedia=new SocialMedia();
        // $websitedetail->web_id         = $request->website;
        $socialmedia->website         = $request->website;
        $socialmedia->link        = $request->link;
        
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($socialmedia->image_path), $imageName);
            $socialmedia->image = $imageName;
        }
        $socialmedia->save();
        return back()->with('success','Successfully Added');

    }
    public function  edit($socialmedia)
    {
        $socialmedia=SocialMedia::where('id',$socialmedia)->first();
       
        // $this->authorize('update', $socialmedia);
        $data['socialmedia'] = $socialmedia;
        $data['submitRoute'] = array('updatesocialmedia',$socialmedia->id);
        
       
    
      
        return view("cms.socialmedia.socialmediaForm",$data);
    }

    public function delete($socialmedia)
    {
        
       
        $socialmedia=SocialMedia::where('id',$socialmedia)->first();
        // $this->authorize('delete', $socialmedia);
        $socialmedia->delete();

    }

    
    public function update($socialmedia,SocialMediaRequest $request)
    {
       
        $socialmedia=SocialMedia::where('id',$socialmedia)->first();
        // $this->authorize('update', $socialmedia);
        $socialmedia->website         = $request->website;
        $socialmedia->link        = $request->link;
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($socialmedia->image_path), $imageName);
            $socialmedia->image = $imageName;
        }
        $socialmedia->save();
        return back()->with('success','Successfully Updated ');

    }
}
