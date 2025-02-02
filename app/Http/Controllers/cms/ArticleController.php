<?php

namespace App\Http\Controllers\cms;

use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\cms\ArticleRequest;

class ArticleController extends Controller
{
 
    private $Image_prefix;
    public function __construct()
    {
        // $this->Image_prefix = "articleImage";
		// $this->middleware('access:role,insert')->only('insertRole');
    }
    public function popular(Request $request){
        $article=Article::find($request->articleId);
        if($request->checked=='checked'){
            $article->popular->delete();    
            return 'removed';
        }
        $article->popular->save();
        return 'added';
    }
    public function newsList(Request $request)
    {
        $this->authorize('view', Article::firstOrNew(['type'=>'news']));
        $data['data']=Article::where('type','news')->get();
        $data['type']='News';
        $data['submitRoute']='newsList';
        
       return view('cms.article.article',$data);
    }

    public function create()
    {
        $this->authorize('create', Article::firstOrNew(['type'=>'news']));
        $data['article'] = new Article();
        $data['submitRoute'] = "insertArticle";
        $data['selectedTags']="";
        $list['tag'] = Tag::pluck('name','name')->toArray();
        $data['tag']=Tag::all(); 
        $data['list'] = $list;
        $data['articleRoute']="newsList";
        
        return view('cms.article.articleForm',$data);
    }

    public function insert(ArticleRequest $request)
    {
        $this->authorize('create', Article::firstOrNew(['type'=>$request->type]));
        $article=new Article();
        $article->title                = $request->title;
        $article->content              = $request->content;
        $article->post_date            = $request->post_date;
        $article->type                 = 'blog';
        $article->author               = $request->author;
        $article->meta_title           =$request->meta_title;
        $article->meta_description     =$request->meta_description;
        $article->meta_keywords        =$request->meta_keywords;
        $article->summary              =$request->summary;
        
   
       
        $article->reference      = encodeUrlSlug($request->reference);
       
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            if($article->type == 'blog')
            {
                $imageName = 'blogthumbnail'.$imageName;
            }
            else{
                $imageName = 'newsthumbnail'.$imageName;
            }
            $request->file('image')->move(public_path($article->image_path), $imageName);
            $article->image = $imageName;
        }
        
        $article->save();
    
        if(isset($request['is_popular']))
        {
            $article->popular->save();
        }

        if($article->type=='news')
        {
            return redirect()->route('newsList')->with('success', 'News Inserted Successfully!');
        }
        else
        {
            return redirect()->route('blogList')->with('success', 'Blog Inserted Successfully!');
            
        }
   }

    public function edit($article)
    {
        $article    =   Article::with('popular')->find($article);
        $this->authorize('update', $article);
        $data['article']        =   $article;
        $list['tag']            =   Tag::all()->pluck('name','name')->toArray();
        $data['list']           =   $list;
        $data['articleRoute']   =   "blogList";
        
        $data['tag']            =   Tag::all(); 
        $data['selectedTags']   =   $article->tags->pluck('name')->toArray();
        $data['submitRoute']    =   array('updateArticle',$article->id);
        $data['route']          =   $article->type."List";
        $data['value']          =   $article->type;
        
        return view("cms.article.articleForm",$data);
    }

    public function update(Article $article,ArticleRequest $request)
    {
        $this->authorize('update',$article);
        $article->title                 = $request->title;
        $article->content               = $request->content;
        $article->post_date             = $request->post_date;
        $article->type                  = 'blog';
        $article->author                = $request->author;
        $article->meta_title            = $request->meta_title;
        $article->meta_description      = $request->meta_description;
        $article->meta_keywords         = $request->meta_keywords;
        $article->summary               = $request->summary;
        $article->reference             = encodeUrlSlug($request->reference);
        
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            if($article->type == 'blog')
            {
                $imageName = 'blogthumbnail'.$imageName;
            }
            else{
                $imageName = 'newsthumbnail'.$imageName;
            }
            $request->file('image')->move(public_path($article->image_path), $imageName);
            $article->image = $imageName;
        }
        if($request['removeimagetxt']!=null)
        {
            $article->image = null;
        }
        
        $article->save();
       
        if(isset($request['is_popular']))
        {
            $article->popular->save();
        }
        else
        {
            $article->popular->delete();
        }
        
        if($article->type == 'news')
        {
            return redirect()->route('newsList')->with('success', 'News Updated Successfully!');
        }
        else
        {
            return redirect()->route('blogList')->with('success', 'Blog Updated Successfully!');
            
        }   
    }

    public function delete(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
    }

    public function blogList(Request $request)
    { 
         $this->authorize('view', Article::firstOrNew(['type'=>'blog']));
         $data['data']=Article::where('type','blog')->get();
         $data['type']='Blog';
         $data['submitRoute']='blogList';
        return view('cms.article.article',$data);
    }

    
    public function loadTags(Request $request)
    {
        $term = $request->input('term');
        $result = Tag::select('name')->where("name","LIKE","%{$term}%")->get();
        return response()->json($result);
    }

        
   public function articletrashList()
   {
     $this->authorize('view', Article::firstOrNew(['type'=>'news']));
    $data['trashedArticles'] = Article::onlyTrashed()->get();
 

    return  view('cms.trashed.articleTrashedList',$data);
       
   }

   public function restoreArticle($id)
   {
        $article = Article::onlyTrashed()->find($id);
        $this->authorize('restore', $article);
        $article->restore();

        return back()->with('success','Successfully Restored');
   }
   public function forceDeleteArticle($id)
   {
        $article = Article::onlyTrashed()->find($id);
        $this->authorize('forceDelete', $article);
        $article->forceDelete();
        
        return back()->with('success','Permanently Deleted!');
   }

}
