<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\SubGroupController;
use Illuminate\Http\Request;
use App\Http\Controllers\FooterController;


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
    return redirect('/cars-home');
});

/* Hiển thị giao diện register */
Route::get('/register', function () {
    return view('layouts.auth.register');
});

Route::get('/login', function () {
    return view('layouts.auth.login');
});

/* Lấy ID user */
Route::get('/edit/{id}', function () {
    return view('app.edituser');
});

Route::fallback(function () {
    return redirect('/cars-home');
});
Route::post('register_test', [UserController::class, 'store'])->name('register.store'); //tạo route để gửi dữ liệu qua UserController
Route::post('/login', [UserController::class, 'login']);
Route::get('/home', [UserController::class, 'index']);
Route::post('/edit-user/{id}', [UserController::class, 'update']); //xử lý User tại hàm update thuộc file UserController
Route::post('/delete/{id}', [UserController::class, 'destroy']);

// Route::fallback(function(){
//     return redirect('/cars-home');
// });
Route::post('register_test', [UserController::class,'store'])->name('register.store');//tạo route để gửi dữ liệu qua UserController
Route::post('/login',[UserController::class,'login']);
Route::get('/home',[UserController::class,'index']);
Route::post('/edit-user/{id}',[UserController::class,'update']);//xử lý User tại hàm update thuộc file UserController
Route::post('/delete/{id}',[UserController::class,'destroy']);

//cars
Route::get('/cars-home', function () {
    return view('layouts.carshome');
});

Route::get('/innovation', function () {
    return view('app.Pages.innovation');
});
Route::get('/events', function () {
    return view('app.Pages.events');
});

//page-design
Route::get('/design', function () {
    return view('app.Pages.design');
});
//Museums & History
Route::get('/museums-history', function () { //index.js
    return view('app.Pages.museumshistory'); //museumshistory.balde.php
});
// Tạo route cho page Company About us
Route::get('/company', function () {
    return view('app.Pages.company');
});

//Admin
Route::get('/admin/innovation', function () {
    return view('app.Admin.Layouts.Innovation.Innovation');
});

Route::get('/admin-header',function(){
    return view('app.Admin.Layouts.Header.Header');
});

Route::get('/admin-addheader',function(){
    return view('app.Admin.Layouts.Header.AddHeader');
});

Route::get('/admin-updateheader/{id}',function(){
    return view('app.Admin.Layouts.Header.UpdateHeader');
});
Route::get('/admin/slides',function(){
    return view('app.Admin.Layouts.Slider.Slider');
});

Route::get('/slides/add-slides',function(){
    return view('app.Admin.Layouts.Slider.Add-Slides');
});

Route::get('/update-slides/{id}',function(){
    return view('app.Admin.Layouts.Slider.Update-Slides');
});

Route::post('/create-slides', [SlidesController::class,'store'])->name('addSlide.store');

Route::post('/update-slides/{id}',[SlidesController::class,'update']);

Route::post('/delete-slides/{id}',[SlidesController::class,'destroy']);


Route::post('/creat-header', [HeaderController::class,'store']);//tạo route để gửi dữ liệu qua HeaderController
Route::post('/update-header/{id}', [HeaderController::class,'update']);
Route::post('/delete-header/{id}',[HeaderController::class,'destroy']);
//  list Footer
// Route::get('/admin/subfooter', function () {
//     return view('app.Admin.Layouts.SubFooter.SubFooter');
// });

// Route::get('/subfooter/add-subfooter', function () {
//     return view('app.Admin.Layouts.SubFooter.Add-SubFooter');
// });

// Route::get('/update-subfooter/{id}', function () {
//     return view('app.Admin.Layouts.SubFooter.Update-SubFooter');
// });

// Route::post('/create-subfooter', [SubFooterController::class, 'store'])->name('addSubFooter.store');
// Route::post('/update-subfooter/{id}', [SubFooterController::class, 'update']);
// Route::post('/delete-subfooter/{id}', [SubFooterController::class, 'destroy']);
Route::get('/admin/footer', function () {
    return view('app.Admin.Layouts.Footer.Footer');
});

Route::get('/footer/add-footer', function () {
    return view('app.Admin.Layouts.Footer.Add-Footer');
});

Route::get('/update-footer/{id}', function () {
    return view('app.Admin.Layouts.Footer.Update-Footer');
});
//Admin
Route::get('/admin/innovation', function () {
    return view('app.Admin.Layouts.Innovation.Innovation');
});
//show subgroup
Route::get('/admin/category',function(){
    return view('app.Admin.Layouts.Subgroup.Subgroup');
});
//update subroup
Route::post('/subgroup-id/{id}',[SubGroupController::class,'update']);
//create subgroup
Route::post('create-category', [SubGroupController::class,'store'])->name('add.store');
//deletesubgroup
Route::post('/delete-subgroup/{id}',[SubGroupController::class,'destroy']);

Route::post('/create-footer', [FooterController::class, 'store'])->name('addFooter.store');
Route::post('/update-footer/{id}', [FooterController::class, 'update']);
Route::post('/delete-footer/{id}', [FooterController::class, 'destroy']);
