<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\PageDetail;
use App\Models\Testimonial;
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
    public function detail(Request $request)
    {
        $blog = $request->route('blog');
        
        $data['blog']         = Article::where('reference',$blog)->first();
        $data['testimonials'] = Testimonial::all();
        $data['pageDetail']   = PageDetail::getContent('blog_detail');
        $article              = Article::where('reference','!=',$blog)->get();
        $data['prevBlog']     = $article->random();
        $data['nextBlog']     = $article->random();
        if(empty($blog))
        {
            abort('404');
        }
        
        return view('blog-detail',$data);
    }
}
