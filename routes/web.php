<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('find');
});

Route::get('/register',[RegisterController::class ,'register'])->name('register');
Route::post('/register',[RegisterController::class,'store']);
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'auth'])->name('auth');
Route::get('/logout',[AuthController::class ,'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/index',[TodoController::class,'index'])->name('index');
    Route::post('/index',[TodoController::class,'store'])->name('todo_store');
    Route::post('/update/{todo}',[TodoController::class,'update'])->name('todo_update');
    Route::get('/delete/{todo}',[TodoController::class, 'delete'])->name('delete');
    Route::get('/find',[FindController::class, 'index'])->name('find');
});