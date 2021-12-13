<?php

Route::group(['namespace' => 'Botble\SocialLogin\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'social-login'], function () {

            Route::get('settings', [
                'as'   => 'social-login.settings',
                'uses' => 'SocialLoginController@getSettings',
            ]);

            Route::post('settings', [
                'as'         => 'social-login.settings.post',
                'permission' => 'social-login.settings',
                'uses'       => 'SocialLoginController@postSettings',
            ]);
        });
    });

    Route::get('auth/{provider}', [
        'as'   => 'auth.social',
        'uses' => 'SocialLoginController@redirectToProvider',
    ])->where('provider', 'facebook|google|github|linkedin');

    Route::get('auth/callback/{provider}', [
        'as'   => 'auth.social.callback',
        'uses' => 'SocialLoginController@handleProviderCallback',
    ])->where('provider', 'facebook|google|github|linkedin');

});
