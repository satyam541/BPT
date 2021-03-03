<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accreditation extends Model
{
    
 use SoftDeletes;
    protected   $table      = 'accreditation';
    protected $primaryKey   = "id";
    public $image_path      = "storage/uploads/accreditation/";


    // public function getImagePath()
    // {// check file exist then return default image.
    //     $imageLink = url($this->image_path.$this->image);
    //     if ($this->hasImage()) {
    //         return $imageLink;
    //     } else {
    //         return url('images/default.png');
    //     }  
    // }


    // public function hasImage()
    // {
    //     if(empty($this->image)) return FALSE;
    //     if (file_exists(public_path($this->Image_path.$this->image))) {
    //         return TRUE;
    //     }
    //     return FALSE;
    // }


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