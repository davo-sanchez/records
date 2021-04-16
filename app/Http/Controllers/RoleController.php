<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRolRequest;
use App\Role;

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
