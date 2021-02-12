<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlineCoursePrice extends Model
{
    use SoftDeletes;
    protected $table = 'course_online_price';
    protected $guarded = array('id');
}
