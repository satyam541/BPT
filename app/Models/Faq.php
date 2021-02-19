<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;
    protected $table = 'frequently_asked_question';
    protected $guarded = array('id');

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('module_type')->orderBy('display_order');
        });
    }

    public function module()
    {
        return $this->morphTo();
    }

    public function getTypeAttribute()
    {
        return $this->module_type;
    }

    public static function courses()
    {
        return self::with('module')->where('module_type',"course")->get()->pluck('module');
    }

}
