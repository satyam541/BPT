<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class SocialMedia extends Model
{
    protected   $table='social_media';
    protected $primaryKey = "id";
    public $image_path = "uploads/socialmedia/";
  
    public function getImagePath()
    {// check file exist then return default image.
        $imageLink = url($this->image_path.$this->image);
        if (file_exists(public_path($this->image_path.$this->image))) {
            return $imageLink;
        } else {
             return url('/images/default.png');
        }
    }
}
