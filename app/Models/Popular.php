<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Popular extends Model
{
    // use SoftDeletes;
    protected $table = 'popular';
    // protected $orderby = 'display_order'; // eh ni chalda
    protected $guarded = array('id');

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('module_type')->orderBy('display_order');
        });
        // if (request()->route()->action['prefix'] != 'cms') {
        //     static::addGlobalScope('country', function (Builder $builder) {
        //         $builder->where("country_id", country()->country_code);
        //     });
        // }
    }

    public function module()
    {
        return $this->morphTo();
    }

    public static function courses()
    {
        return self::with('module')->where('module_type', "course")->get()->pluck('module');
    }

    public static function categories()
    {
        return self::with('module')->where('module_type', "category")->get()->pluck('module');
    }
    public static function topics()
    {
        return self::with('module')->where('module_type', "topic")->get()->pluck('module');
    }

    public static function locations()
    {
        return self::with('module')->where('module_type', "location")->get()->pluck('module');
    }
    public static function article()
    {
        return self::with('module')->where('module_type', "blog")->get()->pluck('module');
    }
    public function getTypeAttribute()
    {
        return $this->module_type;
    }
}
