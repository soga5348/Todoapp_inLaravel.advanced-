<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function auth(AuthRequest $request){
        $credentails = $request->only('email','password');
        if(Auth::attempt($credentails)){
            return redirect()->route('index');
        }
        return redirect()->route('login');
    }
    public function logout(){
        auth()->user()->logout;
        return redirect()->route('login');
    }
    //
}