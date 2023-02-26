<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/auth', [AuthorController::class,'check']);
Route::post('/auth', [AuthorController::class,'checkUser']);
Route::get('/index', [TodoController::class,'index']);
Route::get('/make', [TodoController::class,'make']);

Route::get('/registers', [AuthorController::class,'register']); //多分authのメソッドで/registerにアクセスがあった時に専用の登録ページに遷移するようになっているのだと思うからとりあえず/registersにしている。//
Route::post('/register', [AuthorController::class,'checkUser']);

Route::get('/home',[TodoController::class,'index'])->name('index');
Route::post('/home',[TodoController::class, 'store']);
Route::post('/update/{todo}',[TodoController::class, 'update'])->name('update');
Route::get('/delete/{todo}',[TodoController::class ,'delete'])->name('delete');









Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


