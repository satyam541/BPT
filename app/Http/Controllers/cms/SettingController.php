<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\WebsiteDetail;
use App\Http\Requests\cms\WebsiteDetailRequest;

class SettingController extends Controller
{
  
    private $Logo_prefix;

    public function __construct()
    {
        $this->Logo_prefix = "Logo";
		
    }

    public function websiteDetailList()
    {
        $this->authorize('view', new WebsiteDetail());
        $data['websitedetails'] = WebsiteDetail::paginate(10);
        
      
        
       
        return view('cms.websiteContent.websiteDetail',$data);
    }
    public function createWebsiteDetail()
    {
        // $this->authorize('create', new WebsiteDetail());
        $data['websitedetail'] = new WebsiteDetail();
         $data['submitRoute'] = "insertWebsiteDetail";
        //  $data['websites'] = Website::all()->pluck('name','id')->toArray();
         $data['countries'] = Country::all()->pluck('name','country_code')->toArray();
        return view('cms.websiteContent.websiteDetailform',$data);
    }
 

    public function insertWebsiteDetail(WebsitedetailRequest $request)
    {
        $this->authorize('create', new WebsiteDetail());
        
        $websitedetail=new WebsiteDetail();
        // $websitedetail->web_id         = $request->website;
        $websitedetail->country_id         = $request->country_id;
        $websitedetail->address        = $request->address;
        $websitedetail->contact_number        = $request->contact_number;
        // $websitedetail->name        = $request->name;
        
        $websitedetail->contact_email         = $request->contact_email ;

        $websitedetail->contact_footer         = $request->contact_footer ;

        $websitedetail->copyright_footer        = $request->copyright_footer;
        $websitedetail->opening_hours                  = $request->opening_hours;
         $websitedetail->opening_days                  = $request  ->opening_days;
         $websitedetail->twitter            =$request->twitter;
         $websitedetail->facebook           =$request->facebook;
         $websitedetail->linkedin            =$request->linkedin;
         $websitedetail->courses           =$request->courses;
         $websitedetail->trainers           =$request->trainers;
         $websitedetail->reviews           =$request->reviews;
         $websitedetail->learners            =$request->learners;
         $websitedetail->locations            =$request->locations;
         
       
        $websitedetail->save();
        return redirect()->back();

    }
    public function  editWebsiteDetail(WebsiteDetail $websitedetail)
    {
        $this->authorize('update', $websitedetail);
        $data['websitedetail'] = $websitedetail;
        
        // $data['websites'] = Website::all()->pluck('name','id')->toArray();
        $data['countries'] = Country::all()->pluck('name','country_code')->toArray();
       $data['submitroute'] = array('updateWebsiteDetail',$websitedetail->id);
      
        return view("cms.websiteContent.websiteDetailform",$data);
    }

    public function deleteWebsiteDetail(WebsiteDetail $websitedetail)
    {
        $this->authorize('delete',$websitedetail);
      $websitedetail->delete();

    }

    
    public function updateWebsiteDetail(WebsiteDetail $websitedetail,WebsiteDetailRequest $request)
    {
        $this->authorize('update', $websitedetail);

        // $websitedetail->web_id             = $request->website;
        $websitedetail->country_id         = $request->country;
        $websitedetail->contact_number     = $request->contact_number;
        $websitedetail->address            = $request->address;
        $websitedetail->contact_email      = $request->contact_email ;
        $websitedetail->contact_footer     = $request->contact_footer ;
        $websitedetail->copyright_footer   = $request->copyright_footer;
        $websitedetail->opening_hours       = $request->opening_hours;
        // $websitedetail->name                = $request->name;
        $websitedetail->opening_days       = $request  ->opening_days;
        $websitedetail->twitter            =$request->twitter;
        $websitedetail->facebook           =$request->facebook;
        $websitedetail->linkedin            =$request->linkedin;
        $websitedetail->courses           =$request->courses;
        $websitedetail->trainers           =$request->trainers;
        $websitedetail->reviews           =$request->reviews;
        $websitedetail->learners            =$request->learners;
        $websitedetail->locations            =$request->locations;

        $websitedetail->save();
      
        return redirect()->back();
    }
}
