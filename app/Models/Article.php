<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected   $table='article';
    protected $primaryKey = "id";
    public $image_path = "storage/uploads/article/";
    protected $guarded = array('id');
    public $imageprefix="large_";
    public $appends = ['publish_date'];
    // protected $dates = ['post_date'];


    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag',"article_tag",'article_id','tag_id');
    }

    public function isPopular()
    {
        $popular = $this->popular;
        return empty($popular->id)? FALSE : TRUE;
    }

    public function popular()
    {
        return $this->morphOne('App\Models\Popular', 'module')->withDefault(
            ["country_id" => 'gb',
            "display_order" => Popular::courses()->count()+1]
        );
    }
    public function hasPopular()
    {
        return $this->morphOne('App\Models\Popular', 'module');
    }
 
    public function getImagePath()
    {
        
        if($this->type=='blog')
        {
            $imageLink = url($this->image_path.$this->imageprefix.$this->image);
        
            if (!empty($this->image) && file_exists(public_path($this->image_path.$this->imageprefix.$this->image))) {
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

    public function getPublishDateAttribute()
    {
        return \Carbon\Carbon::parse($this->post_date);
    }
}
