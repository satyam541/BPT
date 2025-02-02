<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'category';
    protected $guarded = array('id');
    public $image_path = "/uploads/category/";
    public $icon_path = "/uploads/category/";
    public  static $selected= NULL;

    public function topics()
    {
        return $this->hasMany("App\Models\Topic");
    }
    
    public function getRouteKeyName()
    {
        $parameter = request()->route()->parameterNames();
        if(end($parameter) == "slug")
        {
            return 'reference';
        }
        else
        {
            return 'id';
        }

    }
    
    public function getImagePath()
    {// check file exist then return default image.
        $imageLink = url($this->image_path.$this->image);
        if (file_exists(public_path($this->image_path.$this->image))) {
            return $imageLink;
        } else {
             return url('/images/default.png');
        }
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

    public function content()
    {
        return $this->hasMany('App\Models\CategoryContent');
    }

    public function categoryContent()
    {
        
        return $this->hasOne('App\Models\CategoryContent')->where('country_id', country()->country_code);
    }

    public function loadContent()
    {
        $object = $this;
        $content = $object->content->where('country_id',country()->id);
        if($content->isEmpty())
        {
            $content = $object->content;
        }
        if($content->isEmpty())
        {
            return false;
        }
        $attributes = $content->first()->getAttributes();
        $original = $object->getAttributes();
        $object->combinedAttributes = array_merge($attributes, $original);
    }

    public function whatsIncluded()
    {
        return $this->belongsToMany("App\Models\WhatsIncludedHeaders",'whats_included', 'module_id','header_id' )->where('module_type', 'category');
    }
    public function faqs()
    {
        return $this->morphMany('App\Models\Faq', 'module');
    } 
    public function Bulletpoint()
    {
        return $this->hasMany('App\Models\BulletPoint','module_id','id')->where('module_type','category');
    }
    public function whatIncludes()
    {
        return $this->hasMany('App\Models\WhatsIncluded','module_id','id');
    }

    public function courses()
    {
        return $this->hasManyThrough('App\Models\Course', 'App\Models\Topic');
    }

    public function popularCourses()
    {
        return $this->courses()->has('popular');
    }
    
    public function popular()
    {
        return $this->morphOne('App\Models\Popular', 'module')
        ->withDefault(
            ["country_id" => country()->country_code,
            "display_order" => Popular::categories()->count()+1]
        );
    }
   

    public function delete()
    {
        $this->popular()->delete();
        $this->content()->delete();
        $this->Bulletpoint()->delete();
        $this->faqs()->delete();
        $this->whatIncludes()->delete();
        return parent::delete();
    }

    public function myRestore()
    {
        $this->content()->restore();
        $this->Bulletpoint()->restore();
        $this->faqs()->restore();
        $this->whatIncludes()->restore();
        return $this->restore();
    }

    public function myforceDelete()
    {
        $this->content()->forceDelete();
        $this->Bulletpoint()->forceDelete();
        $this->faqs()->forceDelete();
        $this->whatIncludes()->forceDelete();
        return $this->forceDelete();
    }

    public function getUrlAttribute()
    {
        $reference =  $this->reference;
        $url = 'training-courses/'.$reference;
        if(country()->country_code != 'gb')
        {
            $url = country()->country_code."/".$url;
        }
        return url($url);
    }

}