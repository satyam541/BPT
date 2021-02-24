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
    
    protected static function boot()
    {
        parent::boot();
        if(request()->route()->action['prefix'] != '/cms'){
            
            
        }
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

    public function venues()
    {
        return $this->hasMany('App\Models\Venue');
    }
    
    public function schedule()
    {
        return $this->hasMany('App\Models\Schedule');
    }

    public function venue()
    {
        return $this->hasOne('App\Models\Venue');
    }

    public function customCoursePrice($courseId)
    {
        $schedule = $this->venue->customSchedulePrice->where('course_id',$courseId)->first();
        if(!empty($schedule))
        {
            return $schedule;
        }
        return new CustomSchedulePrice();
    }

    public function getUrlAttribute()
    {
        return route('location',['locName'=>Str::after($this->reference,'/')]);
    }

    // public function isPopular()
    // {
    //     $popular = $this->popular;
    //     return empty($popular->id)? FALSE : TRUE;
    // }

    public function popular()
    {
        return $this->morphOne('App\Models\Popular', 'module')->withDefault(
            ["country_id" => $this->country_id,
            "display_order" => Popular::locations()->count()+1]
        );
    }

    // public function hasPopular()
    // {
    //     return $this->morphOne('App\Models\Popular', 'module');
    // }
    
    public function delete()
    {
        // File::delete(public_path($this->image_path.$this->image));
        if($this->isPopular())
        {
            $this->popular->delete();
        }
        $this->venues()->delete();
        return parent::delete();
    }

}