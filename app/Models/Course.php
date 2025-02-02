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
        if (request()->route()->action['prefix'] != 'cms') {
            // static::addGlobalScope('published', function (Builder $builder) {
            //     $builder->where("published", 1);
            // });
        }
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
    
    // public function isPopular()
    // {
    //     $popular = $this->popular;
    //     return empty($popular->id)? FALSE : TRUE;
    // }

    public function popular()
    {
        return $this->morphOne('App\Models\Popular', 'module')
        ->withDefault(
            ["country_id" => country()->country_code,
            "display_order" => Popular::courses()->count()+1]
        );
    }
    
    // public function hasPopular()
    // {
    //     return $this->morphOne('App\Models\Popular', 'module');
    // }

    // public function __isset($key)
    // {
    //     dd($key, $this->getAttribute($key));
    //     // return isset();
    // }
    public function loadContent()
    {
        $object = $this;
        $content = $object->content->where('country_id',country()->country_code);
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
        $object->attributes = array_merge($attributes, $original);
    }

    public function delete()
    {
        if($this->is_online = 1)
        {
            $this->is_online = 0;
            $this->save();
        }
        $this->onlinePrice()->delete();
        $this->whatsInclude()->delete();
        $this->popular()->delete();
        $this->faqs()->delete();
        $this->content()->delete();
        $this->BulletPoint()->delete();
        return parent::delete();
    }

    public function myRestore()
    {
        $this->whatsInclude()->restore();
        $this->faqs()->restore();
        $this->content()->restore();
        $this->BulletPoint()->restore();
        return $this->restore();
    }

    public function myforceDelete()
    {
        $this->whatsInclude()->forceDelete();
        $this->faqs()->forceDelete();
        $this->content()->forceDelete();
        $this->BulletPoint()->forceDelete();
        return $this->forceDelete();
    }


    public function countryContent(){
        // return $this->hasOne('App\Models\CourseContent')->where('country_id',country()->id);
        return $this->hasOne('App\Models\CourseContent')->where('country_id',country()->country_code);
    }
    public function content()
    {
        return $this->hasMany('App\Models\CourseContent');
    }

    public function certifications()
    {
        return $this->belongsToMany('App\Models\Certification','certification_course','course_id','certification_id');
    }

    public function faqs()
    {
        return $this->morphMany('App\Models\Faq', 'module');
    }

    public function courseAddon(){
        return $this->belongsToMany('App\Models\CourseAddon','course_addon','course_id','addon_id')->where('country_id',country()->country_code);
    }

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

    /**
     * return link for the course page
     */

    public function customSchedulePrice()
    {
        return $this->hasOne('App\Models\CustomSchedulePrice')->whereNull('location_id')->withDefault();
    }
    public function onlinePrice()
    {
        return $this->hasOne('App\Models\OnlinePrice','course_id')->where('country_id', country()->country_code);
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
        return $this->hasMany('App\Models\Schedule')->where('country_id',country()->country_code);
    }
    public function BulletPoint()
    {
        return $this->hasMany('App\Models\BulletPoint','module_id')->where('module_type','course');
    }
    public function whatsInclude()
    {
        return $this->hasMany('App\Models\WhatsIncluded','module_id');
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