<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $table = 'course';
    protected $guarded = array('id');
    protected $appends = ['url'];
    public $logo_path = "uploads/course/";

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
    
    public function isPopular()
    {
        $popular = $this->popular;
        return empty($popular->id)? FALSE : TRUE;
    }

    public function popular()
    {
        return $this->morphOne('App\Models\Popular', 'module')->withDefault(
            ["country_id" => 'gb',
            "display_order" => Popular::courses()->count()+1]
        );
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

    public function delete()
    {
        if($this->isPopular())
        {
            $this->popular->delete();
        }
       $this->whatsInclude()->delete();
        return parent::delete();
    }

    public function countryContent(){
        // return $this->hasOne('App\Models\CourseContent')->where('country_id',country()->id);
        return $this->hasOne('App\Models\CourseContent')->where('country_id','gb');
    }
    public function content()
    {
        return $this->hasMany('App\Models\CourseContent')->withTrashed();
    }

    public function faqs()
    {
        return $this->morphMany('App\Models\Faq', 'module')->withTrashed();
    }


    public function getLogoPath()
    {// check file exist then return default image.
        $imageLink = url($this->logo_path.$this->logo);
        if ($this->hasLogo()) {
            return $imageLink;
        } else {
            return url('img/default/online-course.svg');
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

    /**
     * return link for the course page
     */

    public function customSchedulePrice()
    {
        return $this->hasOne('App\Models\CustomSchedulePrice')->whereNull('venue_id')->withDefault();
    }
    public function onlinePrice()
    {
        return $this->hasOne('App\Models\OnlinePrice','course_id');
    }

    public function topic()
    {
        return $this->belongsTo("App\Models\Topic");
    }

    public function accreditation()
    {
        return $this->belongsTo("App\Models\Accreditation",'accreditation_id')->withDefault();
    }

    // do not use this relation
    public function category()
    {
        return $this->topic->category();
    }

    public function whatsIncluded()
    {
        return $this->belongsToMany("App\Models\WhatsIncludedHeaders",'whats_included', 'module_id','header_id' )
        ->where('module_type', 'course');
    }
    public function siblings()
    {
        return $this->hasManyThrough("App\Models\Course","App\Models\Topic","topic.id","course.topic_id");
    }
    public function schedule()
    {
        return $this->hasMany('App\Models\Schedule');
    }
    public function BulletPoint()
    {
        return $this->hasMany('App\Models\BulletPoint','module_id')->withTrashed();
    }
    public function whatsInclude()
    {
        return $this->hasMany('App\Models\WhatsIncluded','module_id');
    }
   
}