<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BulletPoint extends Model
{
    //
    use SoftDeletes;
    protected $table = 'bullet_point';
    protected $guarded = array('id');

    public static function boot()
    {
        parent::boot();
    }

    public function module()
    {
        return $this->morphTo();
    }

    // mutator is not doing anything use attribure as it is
    // public function getTypeAttribute()
    // {
    //     return $this->module_type;
    // }

    // not the right way to get all courses having bullet points use has instead
    // public static function courses()
    // {
    //     return self::with('module')->where('module_type',"course")->get()->pluck('module');
    // }

    // use query in controller not in model
    // public static function sortBulletPoint($type,$module_id){
    //     return self::where('module_id',$module_id)->where('module_type',$type)->count();
    // }
    public function Topic()
    {
        return $this->belongsTo('App\Models\Topic','module_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course','module_id');
    
    }
}
