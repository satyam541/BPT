<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseElearning extends Model
{
    use SoftDeletes;
    protected $table = "course_elearning";
    public $path = "uploads/course/";
    
    function course()
    {
        return $this->belongsTo("App\Models\Course",'course_id');
    }
    
    public function whatsIncluded()
    {
        return $this->hasMany("App\Models\whatsIncluded",'course_id')->where('courseType','online');
    }

    public function getVideoPath()
    {
        if(!empty($this->video))
        {   
            $videoLink = $this->path.$this->video;
            if(file_exists(public_path($videoLink))) {
                return url($videoLink);
            }
        } 
        
    } 
    public function getThumbnailPath()
    {
        // check file exist then return default image.
        $imageLink = url($this->path.$this->thumbnail);
        if (file_exists(public_path($this->path.$this->thumbnail))) {
            return $imageLink;
        } else {
             return url('/images/default.png');
        }
    }
    public function videoTag()
    {
        $imageLink = "img/onlinetraining/gray-img.png";
        $posterLink = "";
        if(!empty($this->video))
        {
            $videoLink = $this->path.$this->video;
            $posterLink=$this->path.$this->thumbnail;
            if(file_exists(public_path($videoLink))) {
                return "<video controls poster='".url($posterLink)."'><source src='".url($videoLink)."'></video>";
            }
            else{
                return "<img src='".url($imageLink)."' alt=".$this->online_course_name.">";
            }
        }
        else{
            return "<img src='".url($imageLink)."' alt=".$this->online_course_name.">";
        }
    }

}
