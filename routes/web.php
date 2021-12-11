<?php

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







/*
********************************************************************
*******************ROUTE Ở PHẦN GIAO DIỆN ADMIN********************
********************************************************************
*/

Route::group(['module' => 'dashboard', 'middleware' => 'web', 'namespace' => "App\Http\Controllers"], function () {



    Route::group(['middleware' => ['auth']], function () {
        Route::get("/logout-checkout", ["as" => "admin.logout.index", "uses" => "FrontendController@logout"]);
        Route::group(["prefix" => "dashboard"], function () {
            //             Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
            //     return view('dashboard');
            // })->name('dashboard');
            //Dashboard
            Route::get("/", ["as" => "admin.dashboard.index", "uses" => "AdminController@getIndexAdmin"]);
        });

        Route::group(["prefix" => "hotels"], function () {
            Route::get("/", ["as" => "admin.hotels", "uses" => "AdminController@getAllHotel"]);
            Route::get("addhotel", ["as" => "admin.hotels.add", "uses" => "AdminController@AddHotel"]);
            Route::post("savehotel", ["as" => "admin.hotels.add", "uses" => "AdminController@getSaveHotel"]);
            Route::get("deletehotel/{id}", ["as" => "admin.hotels.edit", "uses" => "AdminController@DeleteHotel"]);
            Route::get("edithotel/{id}", ["as" => "admin.hotels.edit", "uses" => "AdminController@EditHotel"]);
            Route::post("updatehotel/{id}", ["as" => "admin.hotels.eidt", "uses" => "AdminController@UpdateHotel"]);
        });

        Route::group(["prefix" => "categories"], function () {
            Route::get("/", ["as" => "admin.categories", "uses" => "CategoriesController@getAllCategories"]);
            Route::get("add", ["as" => "admin.categories.add", "uses" => "CategoriesController@AddCategories"]);
            Route::post("save", ["as" => "admin.categories.add", "uses" => "CategoriesController@getSaveCategories"]);
            Route::get("delete/{id}", ["as" => "admin.categories.delete", "uses" => "CategoriesController@DeleteCategories"]);
            Route::get("edit/{id}", ["as" => "admin.categories.edit", "uses" => "CategoriesController@EditCategories"]);
            Route::post("update/{id}", ["as" => "admin.categories.eidt", "uses" => "CategoriesController@UpdateCategories"]);
        });
        Route::group(["prefix" => "favorite"], function () {
            Route::get("/", ["as" => "admin.favorite", "uses" => "FavoriteController@getAllFavorite"]);

            Route::get("delete/{id}", ["as" => "admin.favorite.delete", "uses" => "FavoriteController@DeleteFavorite"]);
        });
        Route::group(["prefix" => "rating"], function () {
            Route::get("/", ["as" => "admin.rating", "uses" => "RatingController@getAllRating"]);

            Route::get("delete/{id}", ["as" => "admin.rating.delete", "uses" => "RatingController@DeleteRating"]);
        });
        Route::group(["prefix" => "location"], function () {
            Route::get("/", ["as" => "admin.location", "uses" => "LocationController@getAllLocation"]);
            Route::get("add", ["as" => "admin.location.add", "uses" => "LocationController@AddLocation"]);
            Route::post("save", ["as" => "admin.location.add", "uses" => "LocationController@getSaveLocation"]);
            Route::get("delete/{id}", ["as" => "admin.location.delete", "uses" => "LocationController@DeleteLocation"]);
            Route::get("edit/{id}", ["as" => "admin.location.edit", "uses" => "LocationController@EditLocation"]);
            Route::post("update/{id}", ["as" => "admin.location.eidt", "uses" => "LocationController@UpdateLocation"]);
        });
        Route::group(["prefix" => "admin/favorite"], function () {
            Route::get("/", ["as" => "admin.favorite", "uses" => "FavoriteController@getAllFavorite"]);
            Route::get("/add", ["as" => "admin.favorite.add", "uses" => "FavoriteController@createFavorite"]);
            Route::post("/add", ["as" => "admin.favorite.save", "uses" => "FavoriteController@insertFavorite"]);
            Route::get("delete/{id}", ["as" => "admin.favorite.delete", "uses" => "FavoriteController@deleteFavorite"]);
            Route::get("update/{id}", ["as" => "admin.favorite.edit", "uses" => "FavoriteController@getUpdateFavorite"]);
            Route::post("update/{id}", ["as" => "admin.favorite.eidt", "uses" => "FavoriteController@postUpdateFavorite"]);
        });
        //user rental (Hien thi nguoi dung dat phongf)
        Route::group(["prefix" => "userRental"], function () {
            Route::get("/", ["as" => "admin.userRental", "uses" => "UserRentalController@getAllUserRental"]);
            Route::get("/add", ["as" => "admin.userRental.add", "uses" => "UserRentalController@createUserRental"]);
            Route::post("/add", ["as" => "admin.userRental.save", "uses" => "UserRentalController@insertUserRental"]);
            Route::get("delete/{id}", ["as" => "admin.userRental.delete", "uses" => "UserRentalController@deleteUserRental"]);
            Route::get("update/{id}", ["as" => "admin.userRental.edit", "uses" => "UserRentalController@getUpdateUserRental"]);
            Route::post("update/{id}", ["as" => "admin.userRental.eidt", "uses" => "UserRentalController@postUpdateUserRental"]);
        });
        Route::group(["prefix" => "admin/comment"], function () {
            Route::get("/", ["as" => "admin.comment", "uses" => "CommentController@getAllComment"]);
            Route::get("/add", ["as" => "admin.comment.add", "uses" => "CommentController@createComment"]);
            Route::post("/add", ["as" => "admin.comment.save", "uses" => "CommentController@insertComment"]);
            Route::get("delete/{id}", ["as" => "admin.comment.delete", "uses" => "CommentController@deleteComment"]);
            Route::get("update/{id}", ["as" => "admin.comment.edit", "uses" => "CommentController@getUpdateComment"]);
            Route::post("update/{id}", ["as" => "admin.comment.eidt", "uses" => "CommentController@postUpdateComment"]);
        });
        Route::group(["prefix" => "users"], function () {
            Route::get("/", ["as" => "admin.users", "uses" => "UsersController@getAllUser"]);
            Route::get("add", ["as" => "admin.users.add", "uses" => "UsersController@AddUser"]);
            Route::post("save", ["as" => "admin.users.add", "uses" => "UsersController@getSaveUser"]);
            Route::get("delete/{id}", ["as" => "admin.users.delete", "uses" => "UsersController@DeleteUser"]);
            Route::get("edit/{id}", ["as" => "admin.users.edit", "uses" => "UsersController@EditUser"]);
            Route::post("update/{id}", ["as" => "admin.users.eidt", "uses" => "UsersController@UpdateUser"]);
        });
        // Route::group(["prefix" => "favorite"], function () {
        //     Route::get("/", ["as" => "admin.favorite", "uses" => "UsersController@getFavorite"]);
        // });
    });
});
/*
********************************************************************
*******************ROUTE Ở PHẦN GIAO DIỆN User********************
********************************************************************
*/
Route::group(['module' => 'dashboard', 'middleware' => 'web', 'namespace' => "App\Http\Controllers"], function () {

    Route::get("/login/user", ["as" => "frontend.login.index", "uses" => "FrontendController@getLogin"]);
    Route::get("/logout/user", ["as" => "frontend.logout.index", "uses" => "FrontendController@logout"]);
    Route::post("/login/user", ["as" => "frontend.login.post", "uses" => "FrontendController@postLogin"]);
    Route::get("/register/user", ["as" => "frontend.register.index", "uses" => "FrontendController@getRegister"]);
    Route::post("/register/user", ["as" => "frontend.register.index", "uses" => "FrontendController@postRegister"]);
    Route::get("/registerpassword", ["as" => "frontend.registerpassword.index", "uses" => "FrontendController@register_accuracy"]);
    Route::get("/verycode/user", ["as" => "frontend.verycode.index", "uses" => "FrontendController@getVerycode"]);
    Route::get("/", ["as" => "frontend.dashboard.index", "uses" => "FrontendController@getIndex"]);
    Route::post('/search', ["as" => "search", "uses" => "FrontendController@postSearchAjax"]);

    Route::get("/hotel", ["as" => "frontend.dashboard.index.allhotel", "uses" => "FrontendController@getAllHotel"]);
    Route::get("/hotel/search", ["as" => "frontend.dashboard.index.allhotel.search", "uses" => "FrontendController@getAllHotelSearch"]);
    Route::get("/detail/{id}", ["as" => "frontend.dashboard.index.detailhotel", "uses" => "FrontendController@getDetailHotel"]);

    Route::post("/detail/{id}", ["as" => "frontend.dashboard.index.comment", "uses" => "FrontendController@postComment"]);

    Route::post("/details", ["as" => "frontend.dashboard.index.person", "uses" => "FrontendController@rentalHotelOption"]);
    //profile user display index
    Route::get("/profile", ["as" => "frontend.dashboard.index.profile", "uses" => "FrontendController@getProfile"]);
    //Get update Profile user
    Route::get("/editProfile/{id}", ["as" => "frontend.dashboard.index.editProfile", "uses" => "FrontendController@editProfile"]);
    //update profile
    Route::get("/updateProfile/{id}", ["as" => "frontend.dashboard.index.editProfile", "uses" => "FrontendController@updateProfile"]);

    //Payment hotel
    Route::post("/payment/{id}", ["as" => "frontend.dashboard.index.payment", "uses" => "FrontendController@paymentHotelById"]);
    Route::post("/receip/{id}", ["as" => "frontend.dashboard.index.receip", "uses" => "FrontendController@addReceipForUser"]);
    //
    Route::get("/favorite", ["as" => "frontend.dashboard.index.favorite", "uses" => "FrontendController@getAllHotelFavorite"]);
    Route::post("/hotel", ["as" => "frontend.dashboard.index.favorite.post", "uses" => "FrontendController@postFavoriteOfUser"]);
});
