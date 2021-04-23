<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        return view('users.index',[
            'users' => User::with('roles')
                             ->where('id','<>',Auth::id())
                             ->get()
        ]);
    }

    public function view($id){

        return view('users.view', [
            'user' => User::findOrFail($id),
            'roles' => Role::all()
        ]);

    }

    public function update(UpdateUserRequest $request){

        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->passowrd);

        $user->save();

        DB::table('model_has_roles')
                ->where('model_id','=',$request->id)
                ->update(['role_id' => $request->role]);

        return back();

    }
}
