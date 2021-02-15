<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\cms\RoleRequest;
use App\Http\Requests\cms\UserRequest;
use App\Http\Requests\cms\ChangePasswordRequest;
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
        // $this->authorize('view', new User());
        $filter = $request->all();
        
        $data['selectedName']=null;
        $data['selectedEmail']=null;
        $data['selectedRole']=null;
        if(!empty($filter['name'])){
            $data['selectedName']=$filter['name'];
        }
        if(!empty($filter['email'])){
            $data['selectedEmail']=$filter['email'];
        }
        if(!empty($filter['roleName'])){
            $data['selectedRole']=$filter['roleName'];
        }
        if(!empty($filter))
        {
            $query = User::query();
            $query = $query->select("user.*");
            $query = $query->leftJoin('role_user','user_id','role_id');
            $query = $query->leftJoin('role','role.id','role_user.role_id');
            $query = empty($filter['name'])? $query : $query->where('user.name',$filter['name']);
            $query = empty($filter['email'])? $query : $query->where('user.email',$filter['email']);
            $query = empty($filter['roleName'])? $query : $query->where('role.name',$filter['roleName']);
            $query = empty($filter['active'])? $query : $query->where('user.active',1);
            $users = $query->paginate(10);
            //dd(DB::getQueryLog());
        }
        else{
            $users = User::paginate(10);
        }
        $list['name'] = User::all()->pluck('name','name')->toArray();
        $list['email'] = User::all()->pluck('email','email')->toArray();
        $list['role'] = Role::All()->pluck('name','name')->toArray();
        $data['list'] = $list;
        $data['users'] = $users;
        // dd($data);
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        if(!empty($user->id))
        \Session::flash('success', 'user created!'); 

        return redirect()->back();
    }

    public function editUser(User $user)
    {
        // $this->authorize('update', $user);
        $data['user'] = $user;
        $data['roles']   = Role::all();
       
        return view('cms.manageUser.updateUser',$data);
    }

    public function updateUser(User $user,UserRequest $request)
    {
        
        // $this->authorize('update', $user);
        $inputs = $request->all();
            // dd($inputs);
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        // dd($user);
        $user->active = empty($inputs['active'])? 0 : 1;
        $user->save();
        if(isset($inputs['resetPwd']))
        {
            $user->resetPassword();
        }
        \Session::flash('success', 'user updated successfully!'); 
        return redirect()->back();
    }

    public function roleList()
    {
        // $this->authorize('view', new Role());
        
        $roles= Role::all();
   
    
    $data['roles'] = $roles;
    
    return view('cms.manageUser.roles',$data);
    
}
    public function createRole()
    {
        // $this->authorize('create', new Role());
        return view('cms.manageUser.insertRole');
    }

    public function insertRole(RoleRequest $request)
    {
        // $this->authorize('create', new Role());
        $inputs = $request->all();
        
        $roleName = $request->input('name');
        $description = $request->input('desc');

        $done = Role::create(['name'=> $roleName,'description'=>$description]);
        if($done)
        {
            $request->session()->flash('success', 'New role created successfully.!');
        }
        return redirect()->back();
    }

    public function editRole(Role $role)
    {
        // $this->authorize('update', $role);
        $data['role']    = $role;
        $data['permissions']   = Permission::all()->load('module')->groupBy('module_name');
        // dd($data);
        // dd($data);
        return view('cms.manageUser.updateRole',$data);
    }

    public function updateRole(RoleRequest $request ,Role $role)
    {
        // $this->authorize('update',$role);
        $inputs = $request->all();
        $role->name = $inputs['name'];
        $role->description = $inputs['description'];
        $role->save();
        \Session::flash('success', 'Role updated successfully!'); 
        return redirect()->back();
    }

    public function assignRoles(Request $request)
    {

        $userid = $request->input('user');
        // $authUser = Auth::user();
        $user = User::find($userid);
        $roles = $request->input('role'); // array of role ids
        if(empty($roles))
        {
            $roles = array();
        }
        $user->roles()->sync($roles);
        
        $request->session()->flash('success', 'role assigned successful!');
        return redirect()->back();
    }

    public function assignPermission(Request $request)
    {
        $roleID = $request->input('role');
        $role = Role::find($roleID);
        $permissions = $request->input('permission');// return array of permission id
        $role->permissions()->sync($permissions);
        
        $request->session()->flash('success', 'permission assigned successful!');
        return redirect()->back();
    }

    public function createPermission()
    {
        // $this->authorize('create', new Permission());
        return view('cms.manageUser.insertPermission');
    }

    public function insertPermission(Request $request)
    {

        
        // $this->authorize('create', new Permission());
        $moduleName = $request->input('moduleName');
        $access = $request->input('access');
        $description = $request->input('description');
        $module = Module::where('name',$moduleName)->first();
        if(empty($module->id))
        {
            $module = new Module();
            $module->name = $moduleName;
            $module->save();
        }
        $permission = new Permission();
        $permission->module_id = $module->id;
        $permission->access = $access;
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
        if(!empty($permission->id) && !empty($module->id))
        {
            $request->session()->flash('success', 'New permission created successfully.!');
        }
        return redirect()->back();
    }

    public function permissionList(Request $request)
    {
        // $this->authorize('view', new Permission());
        $filter = $request->all();
        // dd($filter);
        $data['selectedModule']=null;
        $data['selectedAccess']=null;
        if(!empty($filter['moduleName']) || !empty($filter['access'])){
        $data['selectedModule']=$filter['moduleName'];
        $data['selectedAccess']=$filter['access'];
        }
        $data['module']=Module::all()->pluck('name','name')->toArray();
        $data['module']=['ALL'=>'ALL']+$data['module'];
        $data['access']=Permission::all()->pluck('access','access')->toArray();
        $data['access']=['ALL'=>'ALL']+$data['access'];
            $query = Permission::query();
            $query = $query->select("permission.*");
            if(!empty($filter['moduleName']) && $filter['moduleName']!='ALL')
            {
                $module = Module::where('name','like',"%".$filter['moduleName']."%")->first();
                $query = $query->where('module_id',$module->id);
            }
            $query = empty($filter['access'])||$filter['access']=='ALL' ? $query : $query->where('access',$filter['access']);
            $result = $query->paginate(10);

        $data['permissions'] = $result;
    
        return view('cms.manageUser.permissions',$data);
    }
    public function editPermission(Permission $permission)
    {
        // $this->authorize('update', $permission);
        $data['permission']    = $permission;
        return view('cms.manageUser.updatePermission',$data);
    }

    public function updatePermission(Request $request ,Permission $permission)
    {
        // $this->authorize('update', $permission);
        $inputs = $request->all();
        $moduleName = $request->input('moduleName');
        $module = Module::where('name',$moduleName)->first();
        if(empty($module->id))
        {
            $module = new Module();
            $module->name = $moduleName;
            $module->save();
        }
        $permission->module_id = $module->id;
        $permission->access = $inputs['access'];
        $permission->description = $inputs['description'];
        $permission->save();
        \Session::flash('success', 'Permission updated successfully!'); 
        return redirect()->back();
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
        $term = $request->input('term');
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
        $currentPassword=  $request->input('currentPassword');
    
      if(\Hash::check($currentPassword, $current_password))
      {         
           $user_id = \Auth::User()->id;                       
            $user = User::find($user_id);
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
