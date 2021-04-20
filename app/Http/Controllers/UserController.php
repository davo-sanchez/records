<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $roles = \Spatie\Permission\Models\Role::all();

        return view('users.index',[
            'users' => User::with('roles')->get()
        ]);
    }
}
