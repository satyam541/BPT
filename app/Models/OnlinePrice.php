<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlinePrice extends Model
{
    protected $table = 'course_online_price';
    protected $guarded = array('id');


    public function course() {
        return $this->belongsTo('App\Models\Course');
    }
    public function addons()
    {
        return $this->belongsToMany('App\Models\CourseAddon','course_addon','online_price_id','addon_id');
    }

}
