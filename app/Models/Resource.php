<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;
    protected $table='resource';
    protected $guarded= ['id'];
    protected $primaryKey='id';

    public $image_path = "uploads/topic/";
    
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
