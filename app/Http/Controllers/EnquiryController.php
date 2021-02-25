<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Country;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnquiryMail;
use App\Http\Requests\EnquiryRequest;
use App\Models\Course;
use Session;

class EnquiryController extends Controller
{

    public function enquiry()
    {
     
        //  $data['course']=Course::with('content')->where("reference","LIKE","%{$request}%")->first();
      
        return view('enquiry');
    }

    public function validateEnquiry(EnquiryRequest $request)
    {
        if(!(request()->exists('email_address') && empty(request()->get('email_address'))))
        {
           return false; 
        }
        return "done";
    }
    
    public  function insertEnquiry(Request $request)
    { 
        $enquiry        = new Enquiry();
        $input          = $request->all();        
        $email          = $request->email;
        $fname ="";
        $lname ="";
        if(isset($input['name'])){
            $fname = $input['name'];
        }
        if(isset($input['fname'])){
            $fname = $input['fname'];
        }
        if(isset($input['lname'])){
            $lname = $input['lname'];
        }
        
        $fullname       = $fname.' '.$lname;
        
        $fullname       = trim($fullname);
        $enquiry->name  = $fullname;
        // if (empty($input['language'])) {
        //     $enquiry->languages = null;
        // } else {
        //     $enquiry->languages = implode(',', $input['language']);
        // }

        $countryId                      =   country()->id;
        $enquiry->preferred_time        =   empty($input['time']) ? '' : $input['time'];
        $enquiry->email                 =   empty($input['email']) ? '' : $input['email'];
        $enquiry->phone                 =   empty($input['phone']) ? '' : $input['phone'];
        $enquiry->message               =   empty($input['message']) ? '' : $input['message'];
        $enquiry->type                  =   empty($input['type']) ? '' : $input['type'];
        $enquiry->country_id            =   empty($input['country']) ? $countryId : $input['country'];
        $enquiry->address               =   empty($input['address']) ? '' : $input['address'];
        $enquiry->city                  =   empty($input['city']) ? '' : $input['city'];
        $enquiry->profile_link          =   empty($input['profile_link']) ? '' : $input['profile_link'];
        $enquiry->department            =   empty($input['department']) ? '' : $input['department'];
        $enquiry->course                =   empty($input['course']) ? null : $input['course'];
        $enquiry->delegates             =   empty($input['delegates']) ? 1 : $input['delegates'];
        $enquiry->company               =   empty($input['company']) ? null : $input['company'];
        $enquiry->location              =   empty($input['location']) ? null : $input['location'];
        $enquiry->date                  =   empty($input['date']) ? null : $input['date'];
        $enquiry->training_fund         =   empty($input['training_fund']) ? null : $input['training_fund'];
        $enquiry->marketing_consent     =   isset($input['marketing_consent']) ? 1 : 0;
        $enquiry->contact_consent       =   isset($input['contactConsent']) ? 1 : 0;
        $enquiry->delivery_type         =   empty($input['deliveryType']) ? null : $input['deliveryType'];   
        $enquiry->save();
        $data['enquiry']                =   $enquiry;
        $view                           =   \View::make('emails.enquiry',$data);
         $enquiry['emailsent']             =   $view->render();
        
        $enquiry                        =   $enquiry->toArray();
        $enquiry['Url']                 =   $input['Url'] ?? null;
        $enquiry['searchTerm']          =   $input['searchTerm'] ?? null;
        // dd($enquiry);
        if(config('app.env') != "local")
        {
            MakeJWTEnquiry($enquiry);
           
        }
        Mail::to($enquiry['email'])->send(new EnquiryMail($data['enquiry']));
        // Mail::to($email)->cc(config('mail.from.address'))->send(new EnquiryMail($enquiry));
        Session::flash('message', 'Thank you Enquiry');
        // // return "done";
        if($request->ajax())
        {
            return "done";
            
        }
        \Session::flash('message', 'Thank You for Enquiry');
        return redirect()->back();
    }

    public function template()
    {
        return view('emails.enquiry');
    }

    public function postEnquiryPage()
    {
     dd('thank you');   
    }
}
