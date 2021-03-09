<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificationTopic extends Model
{
    use SoftDeletes;
    protected $table = 'certification_topic';

    public function certification()
    {
        return $this->hasOne('App\Models\Certification','id','certification_id');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course','certification_topic_course','certification_topic_id','course_id');
    }
}
