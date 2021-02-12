<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Module;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private $userPermissions;

    private $userRoles;

    
    public function resetPassword($password = 'password')
    {
        $this->password = Hash::make($password);
        return $this->save();
    }

    public function roles()
    {
        // using variable
        if(empty($this->userRoles))
        {
            $this->userRoles = $this->belongsToMany('App\Models\Role','role_user','user_id','role_id');
        }
        return $this->userRoles;
    }

    /**
     * get user with access
     * @return collection of users having similar permission
     */
    public static function withPermission($moduleName,$access)
    {
        $Module = Module::findByName($moduleName);
        $roles = Permission::with('roles')->where("module_id",$Module->id)->where("access",$access)->get()
            ->pluck("roles")->flatten()->pluck("name")->unique()->toArray();

        return Self::withRole($roles);
    }

    /**
     * similar to with_access 
     * works on roles instead
     * @return collection of users having similar roles
     */
    public static function withRole($role)
    {
        $roles = Arr::wrap($role);
        $users = Role::with('users')->whereIn("name",$roles)->get()
            ->pluck("users")->flatten()->unique("email");
            return $users;
    }

    /**
     * use this function to find user access
     * @return boolean
     */
    public function hasPermission($moduleName,$access = null)
    {
        // do not check for permission if the user is admin
        if($this->hasRole('admin'))
        {
            return TRUE;
        }

        $module = Module::findByName($moduleName);
        $permissions = $this->permissions();
        if(empty($module) || $permissions->isEmpty())
        {
            return FALSE;
        }
        if(empty($access))
        {
            $result = $permissions->where('module_id',$module->id);
        }
        else
        {
            $result = $permissions->where('module_id',$module->id)->where('access',$access);
        }
        
        if(!$result->isEmpty())
        {
            return TRUE;
        }
        
        return FALSE;
    }

    /** similar to hasPermission method
     *  works on role instead of access.
     */
    public function hasRole($roleName)
    {
        foreach($this->roles as $role)
        {
            if(strcasecmp($role->name,$roleName) == 0)
            return TRUE;
        }
        return FALSE;
    }

    /** retrieve all the access given to the users
     * @return array of access
     */
    private function permissions()
    {// return array of all actions

        // using actions method only once per page
        //testing required here .............................................................
        if(!empty($this->userPermissions))
        {
            return $this->userPermissions;
        }
        $result = new Collection();
        $testDuplicate = array();
        $modules = Module::whereNotNull('id')->pluck('name', 'id')->toArray();
        foreach($this->roles as $role)
        {
            $result = $result->merge($role->permissions);
        }
        return $result;
    }

}
