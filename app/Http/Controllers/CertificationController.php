<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageDetail;
use App\Models\Certification;

class CertificationController extends Controller
{
    public function index(){
        $pageDetail = PageDetail::where(['page_name'=>'certification','section'=>'metas'])->get();
        if($pageDetail->isNotEmpty())
        {
            $meta['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $meta['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $meta['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($meta);
        }
        $data['certifications']=Certification::with('topic')->get();
        $data['pageDetail'] = PageDetail::getContent('certification');
        return view('certification',$data);
    }
    public function certificationDetail($certification){
       
        $pageDetail = PageDetail::where(['page_name'=>'certification_details','section'=>'metas'])->get();
        if($pageDetail->isNotEmpty())
        {
            $meta['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $meta['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $meta['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($meta);
        }
        $data['certification']=Certification::with('topic.courses')->where('slug',$certification)->first();
        $data['pageDetail'] = PageDetail::getContent('certification_details');
        return view('certificationDetail',$data);
    }
}
