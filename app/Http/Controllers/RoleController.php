<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRolRequest;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('role.index',[
            'roles' => Role::where('editable','=',1)->get()
        ]);
    }

    public function view($id){

        $role = Role::findOrFail($id);

        $expediente_permissions = DB::table('permissions')
        ->where('name', 'like', '%'.'expedientes'.'%')
        ->get();

        $user_permissions = DB::table('permissions')
        ->where('name', 'like', '%'.'user'.'%')
        ->get();

        $role_permissions = DB::table('permissions')
        ->where('name', 'like', '%'.'role'.'%')
        ->get();

        return view('role.view',[
            'role' => $role,
            'expediente_permissions' => $expediente_permissions,
            'user_permissions' => $user_permissions,
            'role_permissions' => $role_permissions
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
}
