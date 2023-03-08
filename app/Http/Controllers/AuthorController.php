<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
public function check(Request $request)
{
return view('auth');
}

public function checkUser(Request $request)
{
  $email = $request->email;
  $password = $request->password;

  $request->validate([
    'email' => 'required|E-Mail',
    'password' => 'required|min:8',],
    [
      'email.required' => 'メールアドレスを入力してください',
      'email.E-Mail' => 'メールアドレスの形式で入力してください',
      'password.required'  => 'パスワードを入力してください',
      'password.greaterthan7'  => '8文字以上で入力してください',
]);
  if (Auth::attempt(['email' => $email,
    'password' => $password])) {
    $text =   Auth::user()->name ;
    return redirect()->route('index');
  }else{$text = 'メールアドレスかパスワードが間違っています';
    return view('index', ['text' => $text]);}

}

public function register(Request $request){
    return view('register');
    
}

public function Logout(Request $request){
  Auth::guard('web')->logout();

  $request->session()->invalidate();

  $request->session()->regenerateToken();

  return redirect('/auth');
  }



}