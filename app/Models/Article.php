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
    // protected $dates = ['post_date'];






    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag',"article_tag",'article_id','tag_id');
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
}
