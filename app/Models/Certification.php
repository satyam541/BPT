<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certification extends Model
{
    use SoftDeletes;
    protected $table = 'certification';
    protected $primaryKey = "id";

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course','certification_course','certification_id','course_id');
    }
}
