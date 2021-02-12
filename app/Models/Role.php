<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Module;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $table = 'role';
    protected $fillable = array('name','description');

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission','permission_role','role_id','permission_id');
    }

    public function hasPermission($moduleName,$access)
    {
        //$modules = Module::pluck('name', 'id')->toArray();
        $module = Module::findByName($moduleName);
        foreach($this->permissions as $permission)
        {
            //if($item->module() == $module && $item->action == $action)
            if  (
                (strcasecmp($permission->module_id,$module->id) == 0) && 
                (strcasecmp($permission->access,$access) == 0)
                )
                return TRUE;
        }
        return FALSE;
    }

    public function users()
    {
        return $this->belongsToMany('App\User','role_user','role_id','user_id')->where('active',1);
    }

}
