<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Schedule extends Model
{
    // use SoftDeletes;
    protected $table = 'schedule';
    protected $guarded = array('id');
    protected $dates = array('response_date');

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }


    // public function location()
    // {
    //     return Location::where('name',$this->response_location)->first()->name ?? null;
    // }

    public function getEndDateAttribute()
    {

        if(is_integer((int)$this->duation)){
            return $this->response_date->addDays(intval($this->duration)-1);
        }
        else '';
    }

    // public function getLocationAttribute()
    // {
    //     if(empty($this->venue))
    //     {
    //         return new Location();
    //     }
    //     return $this->venue->location;
    // }
    
    // public function venueSchedules($name){
    //     return $this->where('response_location',$name)->paginate(10); //need to be remove this function
    // }
    public function getTimeRemainingAttribute()
    {
        $scheduleDate = $this->response_date;
        
        $scheduleDate = Carbon::parse($scheduleDate);
        $today = Carbon::today();

        if($scheduleDate->lte($today) ){
            return "In Progress";
        }
        if($scheduleDate->isTomorrow())
        {
            return "Tommorow";
        }
        elseif($scheduleDate->isCurrentWeek())
        {
            return "This Week";
        }
        elseif($scheduleDate->isNextWeek())
        {
            return "Next Week";
        }
        elseif($scheduleDate->isSameMonth())
        {
            return "This Month";
        }
        elseif($scheduleDate->isNextMonth())
        {
            return "Next Month";
        }
        return FALSE;
    }
}
