<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhatsIncludedHeaders extends Model
{
    use SoftDeletes;
    protected $table = "whats_included_header";
    protected $guarded = [];

    public function course()
    {
        return $this->belongsToMany("App\Models\Course",'whats_included', 'module_id','header_id');
    }
    public function category()
    {
        return $this->belongsToMany("App\Models\Category",'whats_included', 'module_id','header_id');
    }
    public function topic()
    {
        return $this->belongsToMany("App\Models\Topic",'whats_included', 'module_id','header_id');
    }
}
