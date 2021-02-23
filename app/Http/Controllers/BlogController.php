<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\PageDetail;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $pageDetail = PageDetail::where(['page_name'=>'blog','section'=>'metas'])->get();
        if($pageDetail->isNotEmpty())
        {
            $data['title']          = $pageDetail->where('sub_section','title')->first()->heading;
            $data['description']    = $pageDetail->where('sub_section','description')->first()->heading;
            $data['keyword']        = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($data);
        }
        $article                = Article::where('type', 'blog');
        $data['blogs']          = $article->get();
        $data['popularBlogs']   = $article->has('popular')->get();
        $data['pageDetail']     = PageDetail::getContent('blog');
        return view('blog',$data);
    }
}
