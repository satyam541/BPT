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
    private $permissionsCache; // related user permissions cache
    private $rolesCache;  

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
    public function hasPermission($moduleName, $access = null)
    {
        // do not check for permission if the user is admin
        if ($this->hasRole('admin')) {
            return TRUE;
        }
        if (empty(Module::$cache)) {
            Module::$cache = Module::all()->map(function ($item) {
                $item->name = strtolower($item->name);
                return $item;
            });
        }
        $module = Module::$cache->where('name', strtolower($moduleName))->first();
        $module_id = empty($module) ? null : $module->id;

        $permissions = $this->permissions();
        if (empty($module_id) || $permissions->isEmpty()) {
            return FALSE;
        }
        $result = $permissions->where('module_id', $module_id);
        if (!empty($access)) {
            $result = $result->where('access', strtolower($access));
        }

        if (!$result->isEmpty()) {
            return TRUE;
        }

        return FALSE;
    }
    /** similar to hasPermission method
     *  works on role instead of access.
     */
    public function hasRole($roleName)
    {
        //mysql (utf8mb4_unicode_ci) is case insensitive
        if (empty($this->rolesCache)) {
            $this->rolesCache = $this->roles->map(function ($item, $key) {
                $item->name = strtolower($item->name);
                return $item;
            });
        }
        $roleName = strtolower($roleName);
        return $this->rolesCache->where("name", $roleName)->isNotEmpty();
    }

    /** retrieve all the access given to the users
     * @return array of access
     */
    
    private function permissions()
    {
        // using actions method only once per page
        //testing required here .............................................................
        if (empty($this->permissionsCache)) {
            $this->permissionsCache = $this->roles->load("permissions")->pluck("permissions")
                ->collapse()->map(function ($item) {
                    $item->access = strtolower($item->access);
                    return $item;
                });
        }
        return $this->permissionsCache;
    }

}
