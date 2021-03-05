<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PageDetail;
class CategoryController extends Controller
{
    public function index($category){
        $data=[];
        $pageDetail = PageDetail::where(['page_name'=>'category','section'=>'metas'])->get();
        if($pageDetail->isNotEmpty())
        {
            $data['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $data['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $data['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($data);
        }
        $data['pageDetail'] = PageDetail::getContent('category');
        $category=Category::with('categoryContent','topics')->where('reference','/'.$category)->first();
        $data['category']=$category;
        return view('category',$data);
    }
}
