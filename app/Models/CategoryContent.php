<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryContent extends Model
{    
    use SoftDeletes;
    protected $table    = 'category_country_content';
    protected $guarded  = array('id');

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    
    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }
}

