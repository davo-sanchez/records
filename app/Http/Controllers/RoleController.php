<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRolRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Permission;

class RoleController extends Controller
{
    public function __construct(){
/*
        $this->middleware('permission:role-select|role-create|role-edit|role-destroy', ['only' => ['index','view']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-destroy', ['only' => ['destroy']]);*/

        $this->middleware('auth');
    }

    public function index(){
        return view('role.index',[
            'roles' => Role::where('editable','=',1)->get()
        ]);
    }

    public function create(){
        return view('role.create');
    }

    public function store(StoreRolRequest $request){

        $role = new Role;

        $role->name = $request->name;
        $role->guard_name = 'web';

        $role->save();

        return back();

    }

    public function view($id){

        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('role.view',compact('role','permission','rolePermissions'));
        
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('role.view',['id' => $id])
                        ->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }

}
