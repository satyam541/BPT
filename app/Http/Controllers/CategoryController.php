<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PageDetail;
class CategoryController extends Controller
{
    public function index(Request $request){
        $category=Category::with('categoryContent','topics')->where('reference','/'.$request->category)->first();
        $category->loadContent();
        if(!empty($category))
        {
            $data['title'] = $category->meta_title;
            $data['description'] = $category->meta_description;
            $data['keyword'] = $category->meta_keywords; 
            metaData($data);
        }
        $data['pageDetail'] = PageDetail::getContent('category');
        
        $data['category']=$category;
        return view('category',$data);
    }
}
