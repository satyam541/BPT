<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Topic extends Model
{
    use SoftDeletes;
    protected $table = 'topic';
    protected $guarded = array('id');
    protected $appends = ['url'];
    public $image_path = "uploads/topic/";
    
    public $combinedAttributes = array();

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('display_order');
        });
    }
    
    public function __get($attribute)
    {
        if(array_key_exists($attribute,$this->combinedAttributes))
        {
            return $this->combinedAttributes[$attribute];
        }
        return parent::__get($attribute);
    }

    /* overwrite route deffault binding to model */
    public function getRouteKeyName()
    {
        $parameter = request()->route()->parameterNames();
        if(end($parameter) == "course")
        {
            return 'reference';
        }
        else
        {
            return 'id';
        }
    }

    public function getUrlAttribute()
    {
        // $categorySlug = $this->category->reference;
        // $slug = $this->reference;
        // return route('topicPageRoute',['topic'=>$slug]);
    }

    // public function getLogoPath()
    // {// check file exist then return default image.
    //     $imageLink = url($this->logo_path.$this->logo);
    //     if ($this->hasLogo()) {
    //         return $imageLink;
    //     } else {
    //         return url('images/default.png');
    //     }  
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


    public function hasLogo()
    {
        if(empty($this->logo)) return FALSE;
        if (file_exists(public_path($this->logo_path.$this->logo))) {
            return TRUE;
        }
        return FALSE;
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course')->withTrashed();
    }

    public function content()
    {
        return $this->hasMany('App\Models\TopicContent')->withTrashed();
    }

    public function topicContent()
    {
        return $this->hasOne('App\Models\TopicContent')->where('country_id', 'gb');
    }

    public function menuCourses()
    {
        return $this->courses()->where('is_popular',1)->orderBy('display_order');
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

    public function popularCourses()
    {
        return $this->courses()->has('popular');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function accreditation()
    {
        return $this->belongsTo('App\Models\Accreditation','accreditation_id')->withDefault();
    }

    public function isPopular()
    {
        $popular = $this->popular;
        return empty($popular->id)? FALSE : TRUE;
    }

    public function popular()
    {
        return $this->morphOne('App\Models\Popular', 'module')->withDefault(
            ["country_id" =>'gb',
            "display_order" => Popular::topics()->count()+1]
        );
    }

    public function faqs()
    {
        return $this->morphMany('App\Models\Faq', 'module');
    }    
    public function whatsIncluded()
    {
        return $this->belongsToMany("App\Models\WhatsIncludedHeaders",'whats_included', 'module_id','header_id' )->where('module_type', 'topic')->withTrashed();
    }
    public function Bulletpoint()
    {
        return $this->hasMany('App\Models\Bulletpoint','module_id','id')->withTrashed();
    }
    public function whatsInclude()
    {
        return $this->hasMany('App\Models\WhatsIncluded','module_id');
    }
    public function delete()
    {
        // File::delete(public_path($this->image_path.$this->image));
        if($this->isPopular())
        {
            $this->popular->delete();
        }
        $this->whatsInclude()->delete();

        return parent::delete();
    }

    

}
