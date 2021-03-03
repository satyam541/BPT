<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageDetail;
use App\Models\Article;
class ArticleController extends Controller
{
    public function blog(Request $request)
    {
        
        $data['pageDetail'] = PageDetail::getContent('blog');
        $pageDetail         = PageDetail::where(['page_name'=>'blog','section'=>'metas'])->get();

        if($pageDetail->isNotEmpty())
        {
            $data['title']       = $pageDetail->where('sub_section','title')->first()->heading;
            $data['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $data['keyword']     = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($data);
        }

        $data['articles']       = Article::where(['type'=>'blog'])->orderBy('post_date','desc')->paginate(8);
        return view('blog',$data);
    }
}
