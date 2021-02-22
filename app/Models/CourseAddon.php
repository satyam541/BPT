<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseAddon extends Model
{
    
    protected $table = 'addon';
    protected $guarded = array('id');
    // public function course(){
    //     return $this->belongsToMany('App\Models\Course','course_addon','addon_id','course_id');
    // }
    // public function hasAddon(){
    //     dd($this,$this->course());
    // }
}
