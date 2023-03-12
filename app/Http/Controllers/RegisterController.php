<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }
    public function store(AuthRequest $request){
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