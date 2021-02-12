<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bundle extends Model
{
    use SoftDeletes;
    protected $table = 'bundle';
    protected $guarded = array('id');

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course', 'bundle_course', 'bundle_id', 'course_id');
    }
}
