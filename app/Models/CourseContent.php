<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseContent extends Model
{
    use SoftDeletes;
    protected $table    = 'course_country_content';
    protected $guarded  = array('id');

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    
    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }
}