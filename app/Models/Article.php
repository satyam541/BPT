<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected   $table='article';
    protected $primaryKey = "id";
    public $image_path = "/uploads/article/";
    protected $guarded = array('id');
    public $imageprefix="large_";
    public $appends = ['publish_date'];
    // protected $dates = ['post_date'];


    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag',"article_tag",'article_id','tag_id');
    }

    // use has('popular') instead
    // public function isPopular()
    // {
    //     $popular = $this->popular;
    //     return empty($popular->id)? FALSE : TRUE;
    // }

    public function next(){
        $article=Article::select('id','image','title', 'reference','type')
                            ->where('id', '>', $this->id)
                            ->orderBy('id','asc')
                            ->first();
        if(empty($article)){
            $article = Article::select('id','image','title', 'reference','type')->first();
        }
        return $article;
    }
    
    public  function previous(){
        $article =Article::select('id','image','title', 'reference','type')
                            ->where('id', '<', $this->id)
                            ->orderBy('id','desc')
                            ->first();
        if(empty($article)){
            $article = Article::select('id','image','title', 'reference','type')
                                ->orderBy('id', 'desc')
                                ->first();
        }
        return $article;
    }

    public function popular()
    {
        return $this->morphOne('App\Models\Popular', 'module')->withDefault(
            ["country_id" => 'gb',
            "display_order" => Popular::article()->count()+1]
        );
    }
    // public function hasPopular()
    // {
    //     return $this->morphOne('App\Models\Popular', 'module');
    // }
 
    public function getImagePath()
    {
        
        if($this->type=='blog')
        {
            $imageLink = url($this->image_path.$this->image);
        
            if (!empty($this->image) && file_exists(public_path($this->image_path.$this->image))) {
                return $imageLink;
            } else {
                if($this->type=='news')
                {
                    return  url('img/about/news.jpg');
                }
                else
                {
                return  url('img/blog/blog1.jpg');
                }
            }
        }
    }

    // add post_date attribute to dates mutator
    public function getPublishDateAttribute()
    {
        return \Carbon\Carbon::parse($this->post_date);
    }
    
    public function delete()
    {
        $this->popular()->delete();
        return parent::delete();
    }
}
