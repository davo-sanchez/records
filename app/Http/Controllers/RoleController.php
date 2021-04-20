<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRolRequest;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('role.index',[
            'roles' => Role::all()
        ]);
    }

    public function view($id){

        $role = Role::findOrFail($id);

        $permissions = Permission::all();

        return view('role.view',[
            'permissions' => Role::all()
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
