<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }
    public function store(Request $request){
        $user = new User();
        $user->fill($request->all());
        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('login');
    }
    //
}