<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/products', [ProductController::class, 'index'])->name('get_products');
    Route::get('/categories', [CategoryController::class, 'index'])->name('get_products');
    Route::get('/product/{product_slug}', [ProductController::class, 'show'])->name('get_detail_product');
    Route::post('/add-to-cart', [CartController::class, 'store'])->name('add-to-cart');
    Route::post('/update-cart', [CartController::class, 'update'])->name('update-cart');
    Route::post('/delete-item-in-cart', [CartController::class, 'destroySingleItem'])->name('delete-item-in-cart');
    Route::post('/cart', [CartController::class, 'index'])->name('cart-detail');
    Route::get('/search/{key}', [ProductController::class, 'searchByName'])->name('search-product');
    Route::get('/category/{id}', [ProductController::class, 'getByCategory'])->where('id', '[0-9]+')->name('get-product-by-category');
});
