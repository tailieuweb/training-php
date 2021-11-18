<?php

Route::group([
    'middleware' => 'api',
    'prefix'     => 'api/v1',
    'namespace'  => 'Botble\Blog\Http\Controllers\API',
], function () {

    Route::get('search', 'PostController@getSearch');
    Route::get('posts', 'PostController@index');
    Route::get('categories', 'CategoryController@index');
    Route::get('tags', 'TagController@index');

    Route::get('posts/filters', 'PostController@getFilters');
    Route::get('posts/{slug}', 'PostController@findBySlug');
    Route::get('categories/filters', 'CategoryController@getFilters');
    Route::get('categories/{slug}', 'CategoryController@findBySlug');

    /**
     * POST BY LAP API
     * */
    /*
     * Get all category
     * Lấy tất cả category
     */
    Route::get('get-all-categories', 'CustomPostController@getAllCategories');
    /*
     * get profile by Categories
     * Lấy tất cả  bài viết theo category
     * Lấy tất cả  bài viết
     */
    Route::get('get-post-by-category', 'CustomPostController@getPostByCategory');


    /**
     * API post management
     */

    //Get Detail
    Route::get('post-detail', 'CustomPostController@getPostById');


    Route::group(['middleware' => ['auth:member-api']], function () {

        // Get all post
        Route::get('get-all-post', 'CustomPostController@getAllPost');
        // Create post
        Route::post('create-post', 'CustomPostController@createPost');
        // Update post
        Route::post('update-post','CustomPostController@updatePost');
        // Delete post.
        Route::post('delete-post', 'CustomPostController@deletePost');
    });
});
