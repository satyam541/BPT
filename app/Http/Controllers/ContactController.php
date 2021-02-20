<?php

namespace App\Http\Controllers;

use App\Models\PageDetail;
use App\Models\Course;
use App\Models\Socialmedia;
class ContactController extends Controller
{
    public function index()
    {
        $pageDetail = PageDetail::where(['page_name'=>'contact_us','section'=>'metas'])->get();
        if($pageDetail->isNotEmpty())
        {
            $data['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $data['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $data['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($data);
        }
        $data['socialmedias']=SocialMedia::all();
        $data['websiteDetail']=websiteDetail();
        $data['pageDetail'] = PageDetail::getContent('contact_us');
        return view('contactus',$data);
    }
}
