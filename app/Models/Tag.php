<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected   $table='tag';
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article',"article_tag",'tag_id','article_id');
    }
    
}
