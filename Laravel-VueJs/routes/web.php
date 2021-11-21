<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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
//tạo route login
Route::get('/', function () {
    return redirect('/login');
});

/* Hiển thị giao diện register */
Route::get('/register',function(){
    return view('layouts.auth.register');
});

Route::get('/login',function(){
    return view('layouts.auth.login');
});

/* Lấy ID user */
Route::get('/edit/{id}',function(){
    return view('app.edituser');
});


Route::fallback(function(){
    return redirect('/home');
});
Route::post('register_test', [UserController::class,'store'])->name('register.store');//tạo route để gửi dữ liệu qua UserController
Route::post('/login',[UserController::class,'login']);
Route::get('/home',[UserController::class,'index']);
Route::post('/edit-user/{id}',[UserController::class,'update']);//xử lý User tại hàm update thuộc file UserController
Route::post('/delete/{id}',[UserController::class,'destroy']);
