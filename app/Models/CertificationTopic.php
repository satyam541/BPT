<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificationTopic extends Model
{
    use SoftDeletes;
    protected $table = 'certification_topic';
    protected $withCount = ['courses'];

    public function certification()
    {
        return $this->belongsTo('App\Models\Certification');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course','certification_topic_course','certification_topic_id','course_id');
    }
}
