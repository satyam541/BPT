<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageDetail;
class OnsiteController extends Controller
{
    public function index(){
        $pageDetail = PageDetail::where(['page_name'=>'onsite','section'=>'metas'])->get();
        if(!$pageDetail->isEmpty())
        {
            $meta['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $meta['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $meta['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($meta);
        }
        $data['pageDetail'] = PageDetail::getContent('onsite');
        return view('onsite',$data);
    }
}
