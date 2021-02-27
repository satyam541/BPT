<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\cms\RoleRequest;
use App\Http\Requests\cms\UserRequest;
use App\Http\Requests\cms\PermissionRequest;
use App\Http\Requests\cms\ChangePasswordRequest;
use App\Events\CreateUser;
use DB;
use App\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Module;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		// $this->middleware('access:role,insert')->only('insertRole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function userList(Request $request)
    {
        $this->authorize('view', new User());
        $filter = $request->all();
        $data['selectedName']        =   null;
        $data['selectedEmail']       =   null;
        $data['selectedRole']        =   null;
        $data['active']              =   null;
        if(!empty($filter['name'])){
            $data['selectedName']    =   $filter['name'];
        }
        if(!empty($filter['email'])){
            $data['selectedEmail']   =   $filter['email'];
        }
        if(!empty($filter['roleName'])){
            $data['selectedRole']    =   $filter['roleName'];
        }
        if(isset($filter['active'])){
            $data['active']          =   1;
        }
            $query                   =   User::query();
        if(!empty($filter))
        {

            $query = empty($filter['name'])? $query : $query->where('name',$filter['name']);
            $query = empty($filter['email'])? $query : $query->where('email',$filter['email']);
            $query = empty($filter['active'])? $query : $query->where('active',1);
            $query = empty($filter['roleName'])? $query : $query->whereHas('roles', function($q)use($filter){
                $q->where('name',$filter['roleName']);
            });
        }
        $users = $query->paginate(10);
        $list['name']   = User::all()->pluck('name','name')->toArray();
        $list['email']  = User::all()->pluck('email','email')->toArray();
        $list['role']   = Role::All()->pluck('name','name')->toArray();
        $data['list']   = $list;
        $data['users']  = $users;
        
        return view('cms.manageUser.users',$data);
    }

    public function createUser(Request $request)
    {
        $this->authorize('create', new User());
        return view('cms.manageUser.insertUser');
    }

    public function insertUser(UserRequest $request)
    {
        $this->authorize('create', new User());
        $data = $request->all();
        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
        ]);
        Event(new CreateUser($user));
        
        return redirect()->route('userList')->with('success', 'User Created!');
    }

    public function editUser(User $user)
    {
        $this->authorize('update', $user);
        $data['user']   = $user;
        $data['roles']  = Role::all();
       
        return view('cms.manageUser.updateUser',$data);
    }

    public function updateUser(User $user,UserRequest $request)
    {
        
        $this->authorize('update', $user);
        $inputs         = $request->all();
        $user->name     = $inputs['name'];
        $user->email    = $inputs['email'];
        $user->active   = empty($inputs['active'])? 0 : 1;
        $user->save();
        if(isset($inputs['resetPwd']))
        {
            $user->resetPassword();
        }
        return redirect()->route('userList')->with('success', 'User Updated Successfully!');
    }

    public function roleList()
    {
        $this->authorize('view', new Role());
        
        $roles= Role::all();
        $data['roles'] = $roles;
        
        return view('cms.manageUser.roles',$data);
        
}
    public function createRole()
    {
        $this->authorize('create', new Role());
        return view('cms.manageUser.insertRole');
    }

    public function insertRole(RoleRequest $request)
    {
        $this->authorize('create', new Role());
        $inputs         = $request->all();
        $roleName       = $request->input('name');
        $description    = $request->input('desc');
        $done = Role::create(['name'=> $roleName,'description'=>$description]);
        return redirect()->route('roleList')->with('success', 'Role Updated Successfully!');

    }

    public function editRole(Role $role)
    {
        $this->authorize('update', $role);
        $data['role']          = $role;
        $data['permissions']   = Permission::all()->load('module')->groupBy('module_name');
        return view('cms.manageUser.updateRole',$data);
    }

    public function updateRole(RoleRequest $request ,Role $role)
    {
        $this->authorize('update',$role);
        $inputs             = $request->all();
        $role->name         = $inputs['name'];
        $role->description  = $inputs['description'];
        $role->save();
        return redirect()->route('roleList')->with('success', 'Role Updated Successfully!');
    }

    public function assignRoles(Request $request)
    {

        $userid = $request->input('user');
        // $authUser = Auth::user();
        $user   = User::find($userid);
        $roles  = $request->input('role'); // array of role ids
        if(empty($roles))
        {
            $roles = array();
        }
        $user->roles()->sync($roles);
        
        return back()->with('success', 'Role Assigned Successfully!');
    }

    public function assignPermission(Request $request)
    {
        $roleID      = $request->input('role');
        $role        = Role::find($roleID);
        $permissions = $request->input('permission');// return array of permission id
        $role->permissions()->sync($permissions);
        return back()->with('success', 'Permission Assigned Successful!');
    }

    public function createPermission()
    {
        $this->authorize('create', new Permission());
        return view('cms.manageUser.insertPermission');
    }

    public function insertPermission(PermissionRequest $request)
    {
        $this->authorize('create', new Permission());
        $moduleName     = $request->input('moduleName');
        $access         = $request->input('access');
        $description    = $request->input('description');
        $module         = Module::where('name',$moduleName)->first();
        if(empty($module->id))
        {
            $module         = new Module();
            $module->name   = $moduleName;
            $module->save();
        }
        $permission              = new Permission();
        $permission->module_id   = $module->id;
        $permission->access      = $access;
        $permission->description = $description;
        try{
            $permission->save();
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            if(Str::endsWith($ex->errorInfo[2],"for key 'permission Set'"))
            {
                $validator = Validator::make([],[]);
                $validator->errors()->add("access",'Permission Type already exist');
                throw new \Illuminate\Validation\ValidationException($validator);
            }
            else
            {
                //return $ex;
            }
        }
        
        return redirect()->route('permissionList')->with('success', 'New Permission Created Successfully.!');
    }

    public function permissionList(Request $request)
    {
        $this->authorize('view', new Permission());
        $filter = $request->all();
<<<<<<< HEAD
        $data['selectedModule'] =   null;
        $data['selectedAccess'] =   null;
=======
        
        $data['selectedModule']     =   null;
        $data['selectedAccess']     =   null;
>>>>>>> 8ffa510dc908d6bd62a01c092e1bc9ac352a5f8d
        if(!empty($filter['moduleName']) || !empty($filter['access']))
        {
            $data['selectedModule'] =   $filter['moduleName'];
            $data['selectedAccess'] =   $filter['access'];
        }
        $data['module'] =   Module::all()->pluck('name','name')->toArray();
        $data['module'] =   ['ALL'=>'ALL']+$data['module'];
        $data['access'] =   Permission::all()->pluck('access','access')->toArray();
        $data['access'] =   ['ALL'=>'ALL']+$data['access'];
        $query          =   Permission::query();
        $query          =   $query->select("permission.*");
        if(!empty($filter['moduleName']) && $filter['moduleName']!='ALL')
        {
            $module = Module::where('name',$filter['moduleName'])->first();
            $query  = $query->where('module_id',$module->id);
        }
        $query  = empty($filter['access'])||$filter['access']=='ALL' ? $query : $query->where('access',$filter['access']);
        $result = $query->paginate(10);

        $data['permissions'] = $result;
    
        return view('cms.manageUser.permissions',$data);
    }
    public function editPermission(Permission $permission)
    {
        $this->authorize('update', $permission);
        $data['permission']    = $permission;
        return view('cms.manageUser.updatePermission',$data);
    }

    public function updatePermission(PermissionRequest $request ,Permission $permission)
    {
        $this->authorize('update', $permission);
        $inputs     = $request->all();
        $moduleName = $request->input('moduleName');
        $module     = Module::where('name',$moduleName)->first();
        if(empty($module->id))
        {
            $module       = new Module();
            $module->name = $moduleName;
            $module->save();
        }
        $permission->module_id   = $module->id;
        $permission->access      = $inputs['access'];
        $permission->description = $inputs['description'];
        $permission->save();
        return redirect()->route('permissionList')->with('success', 'Permission Updated Successfully!');
    }

    public function deleteUser(Request $request,User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
    }

    public function deleteRole(Request $request,Role $role)
    {
        $this->authorize('delete', $role);
        $role->delete();
    }

    public function deletePermission(Request $request,Permission $permission)
    {
        $this->authorize('delete', $permission);
        $permission->delete();
    }

    public function loadModules(Request $request)
    {
        $term   = $request->input('term');
        $result = Module::select('name')->where("name","LIKE","%{$term}%")->get();
        return response()->json($result);
    }
    public function changepass()
    {
     return view('cms.manageUser.changepassword');

    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $current_password = \Auth::User()->password; 
        $currentPassword  =  $request->input('currentPassword');
    
      if(\Hash::check($currentPassword, $current_password))
      {         
           $user_id         = \Auth::User()->id;                       
            $user           = User::find($user_id);
            $user->password = \Hash::make($request->input('newPassword'));
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Changed!');
        }
        else
        {           
              \Session::flash('failure','Please enter correct current password');
               return redirect()->back();
        } 
    }
}
