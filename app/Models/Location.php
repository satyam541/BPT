<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Location extends Model
{
    use SoftDeletes;
    protected $table   = 'location';
    protected $guarded = array('id');
    protected $appends = ['url'];
    
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('country', function (Builder $builder) {
            $builder->where("country_id", country()->country_code);
        });
        static::addGlobalScope('order', function (Builder $builder) {
           
            
            $builder->orderByRaw("Field(tier,'1','2','3','4','0')");
            $builder->orderByRaw("Field(name,'London','Birmingham','Manchester')");
            // $builder->orderBy('name');
        });
        
    }

    public function setReferenceAttribute($value)
    {
        $this->attributes['reference'] = strtolower($value);
    }

    public static function findByName($locationName)
    {
        return self::where('name',$locationName)->first();
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region')->withDefault();
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country',"country_id");
    }
    
    public function schedule()
    {
        return $this->hasMany('App\Models\Schedule');
    }

    public function customSchedulePrice()
    {
        return $this->hasMany('App\Models\CustomSchedulePrice');
    }

    public function customCoursePrice($courseId)
    {
        $schedule = $this->customSchedulePrice->where('course_id',$courseId)->first();
        if(!empty($schedule))
        {
            return $schedule;
        }
        return new CustomSchedulePrice();
    }

    public function popular()
    {
        return $this->morphOne('App\Models\Popular', 'module')->withDefault(
            ["country_id" => $this->country_id,
            "display_order" => Popular::locations()->count()+1]
        );
    }
    public function delete()
    {
        $this->popular()->delete();
        return parent::delete();
    }

    public function getUrlAttribute()
    {
        $reference =  $this->reference;
        $url = 'training-location/'.$reference;
        if(country()->country_code != 'gb')
        {
            $url = country()->country_code."/".$url;
        }
        return url($url);
    }
}