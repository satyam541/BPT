<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certification extends Model
{
    use SoftDeletes;
    protected $table = 'certification';
    protected $primaryKey = "id";
    protected $appends = ['url'];
    public $image_path = "/uploads/category/";
    public $icon_path = "/uploads/category/";

    public function topics()
    {
        return $this->hasMany('App\Models\CertificationTopic');
    }

    public function getUrlAttribute()
    {
        $reference =  $this->reference;
        $url = 'certification-programmes/'.$reference;
        if(country()->country_code != 'gb')
        {
            $url = country()->country_code."/".$url;
        }
        return url($url);
    }
    public function getImagePath()
    {// check file exist then return default image.
        $imageLink = url($this->image_path.$this->image);
        if (file_exists(public_path($this->image_path.$this->image))) {
            return $imageLink;
        } else {
             return url('/images/default.png');
        }
        return url('/uploads/category/categoryImage1563435608.png');
    }

    public function getIconPath()
    {
        $imageLink = url($this->icon_path.$this->icon);
        if(!empty($this->icon))
        {   
            if (file_exists(public_path($this->icon_path.$this->icon))) {
                return $imageLink;
            }
        } 
        return url('/uploads/category/categoryImage1563435608.png');
    }
}
