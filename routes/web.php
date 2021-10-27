<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'index'])->name('index');

/*---------------------User route group start---------------------*/
Route::group(['prefix' => '/user'], function () {
    Route::get('/login', [UserController::class, 'userLogin'])->name('user.login');
    Route::post('/login', [UserController::class, 'userLoginSubmit'])->name('user.login.submit');
    Route::get('/register', [UserController::class, 'userRegister'])->name('user.register');
    Route::post('/register', [UserController::class, 'userRegisterSubmit'])->name('user.register.submit');
});
/*---------------------User route group end-----------------------*/

//Add new product
//Route::resource('product', ProductController::class);
//Show product detail
Route::get('/product/{slug}', [PageController::class, 'productDetail'])->name('product.detail');
//Show list all products
Route::get('/products', [PageController::class, 'listProducts'])->name('product.list');
//Cart
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('cart/add/{slug}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('cart/remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('cart/update', [CartController::class, 'updateCart'])->name('cart.update');
