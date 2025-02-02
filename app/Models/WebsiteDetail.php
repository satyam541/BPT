<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
class WebsiteDetail extends Model
{
    
     use SoftDeletes;
    protected   $table='website_country';
    protected $primaryKey = "id";
    public static $selected = null;
    public $logo_path = "uploads/websiteDetail/";

    public function getLogoPath()
    {// check file exist then return default image.
        $imageLink = url($this->logo_path.$this->image);
        if ($this->hasLogo()) {
            return $imageLink;
        } else {
            return url('adminlte/dist/img/online-course.svg');
        }  
    }

    public function hasLogo()
    {
        if(empty($this->image)) return FALSE;
        if (file_exists(public_path($this->logo_path.$this->image))) {
            return TRUE;
        }
        return FALSE;
    }
    

    public function country()
    {
        return $this->belongsTo('App\Models\Country',"country_id")->withdefault();
    }
    public function website()
    {
        return $this->belongsTo('App\Website',"web_id")->withdefault();
    }

}
