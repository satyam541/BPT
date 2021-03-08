<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Country;

class EnquiryController extends Controller
{
    public function enquiryList(Request $request)
    {
        $this->authorize('view', new Enquiry());
        $data['selectedCourse'] =   null;
        $data['selectedType']   =   null;
        $course                 =   $request->get('course');
        $type                   =   $request->get('type');
        $query                  =   Enquiry::query();
        if(!empty($course)){
            $data['selectedCourse']  =   $course;
            $query->where('course',$course);
        }
        if(!empty($type)){
            $data['selectedType']    =   $type;
            $query->where('type',$type);
        }
        $result = $query->orderByDesc('created_at')->paginate(10);
        $list['courses']    = Enquiry::all()->pluck('course','course')->unique()->filter()->toArray();
        $list['types']      = Enquiry::all()->pluck('type','type')->unique()->filter()->toArray();
        $request->flash();
        $data['list']       = $list;
        $data['enquiries']  = $result;
        return view('cms.enquiry.enquiry',$data);
    }
    public function enquiryDetail($id)
    {
      
        $enquiry    = Enquiry::find($id);
        $data['enquiry'] = $enquiry;
        return view('cms.enquiry.enquirydetail',$data);
    }
}
