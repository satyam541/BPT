<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;
    protected   $table='testimonial';
    protected $primaryKey = "id";
    public $image_path = "uploads/testimonial/";


public function getImagePath()
{// check file exist then return default image.
    $imageLink = url($this->image_path.$this->image);
    if (!empty($this->image) && file_exists(public_path($this->image_path.$this->image))) {
        return $imageLink;
    } else {
        return url('img/blog/blog-3.svg');
    }
}

}