<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseAddon extends Model
{
    use SoftDeletes;
    protected $table = 'addon';
    protected $guarded = array('id');

}
