<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
    protected $table = 'region';
    protected $guarded = array('id');

    public function locations()
    {
        return $this->hasMany('App\Models\Location');
    }

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucwords(strtolower($value));
    }
    
}
