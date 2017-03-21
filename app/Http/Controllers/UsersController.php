<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();
        return view('welcome', compact('users'));
    }

    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirm' => 'required'
        ]);

        //User::create(request(['name', 'email', 'password']));
        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();

        return redirect('/');
    }
}
