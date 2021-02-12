<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    protected $table = 'permission';
    protected $fillable = array('module_id','access');

    public function module()
    {
        return $this->belongsTo('App\Models\Module','module_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','permission_role','permission_id','role_id');
    }

    public function getModuleNameAttribute()
    {
        return $this->module->name;
    }

}
