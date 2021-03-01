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
        $filter     = $request->all();
        $query      = Enquiry::query();
        $data['selectedCourse']     = empty($filter['course'])? NULL : $filter['course'];
        $data['selectedType']       = empty($filter['type'])? NULL : $filter['type'];

        $query  = empty($filter['course'])? $query : $query->where('course',$filter['course']);
        $query  = empty($filter['type'])? $query : $query->where('type',$filter['type']);
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
