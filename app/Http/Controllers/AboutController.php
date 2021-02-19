<?php

namespace App\Http\Controllers;

use App\Models\PageDetail;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageDetail = PageDetail::where(['page_name'=>'about-us','section'=>'metas'])->get();
        if(!$pageDetail->isEmpty())
        {
            $meta['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $meta['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $meta['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($meta);
        }
        $data['pageDetail'] = PageDetail::getContent('about-us');

        return view('about',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
