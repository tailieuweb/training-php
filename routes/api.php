<?php

use App\Models\user_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login',[UserController::class,'login']); // Api Login
Route::post('/register',[UserController::class,'register']); // Api Register
Route::get('/info',[UserController::class,'infoview'])->middleware('auth:api')->name('userinfo'); // Api Get info user
Route::post('/info',[UserController::class,'infoPost'])->middleware('auth:api'); // Api  Update info user
Route::post('/password',[UserController::class,'PasswordUpdate'])->middleware('auth:api');// APi Update PassWord
Route::get('/logout',[UserController::class,'UserLogout'])->middleware('auth:api'); // Api Logout user
Route::get('/user_cart',[CartController::class,'Show'])->middleware('auth:api'); // Api User Cart

Route::resource('/product', 'App\Http\Controllers\Api\ProductController');
Route::resource('/user', 'App\Http\Controllers\Api\UserController');
Route::resource('/category', 'App\Http\Controllers\CategoryController');
Route::get('/searchProduct',[ProductController::class,'getSearch'])->name('product.search');
