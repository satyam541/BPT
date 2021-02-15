<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'module';
    protected $fillable = array('name');
    public static $cache = array();

    public static function findByName($moduleName)
    {
        return self::where('name',$moduleName)->first();
    }
}