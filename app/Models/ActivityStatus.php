<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityStatus extends Model
{
    protected $table = "activity_status";
    protected $fillables = ['status'];
    public $timestamps = false;
}