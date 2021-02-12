<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhatsIncluded extends Model
{
    use SoftDeletes;
    protected $table = "whats_included";
    protected $guarded = [];
    function header(){
        return $this->hasOne("App\Models\whatsIncludedHeaders",'id','header_id');
    }
    function course(){
        return $this->hasOne("App\Models\Course",'id','module_id')->where('module_type', 'course');
    }
    public function category()
    {
        return $this->belongsTo("App\Models\Category",'id','module_id');
    }
    function courses(){
        return $this->belongsTo('App\Models\Course','module_id');
    }
    function topic(){
        return $this->belongsTo('App\Models\Topic','module_id');
    }
}
