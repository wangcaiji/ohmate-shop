<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::any('/wechat', 'WechatController@serve');
    Route::get('/menu', 'WechatController@menu');

    Route::group(['prefix' => 'register'], function () {
        Route::get('/create', 'RegisterController@create');
        Route::post('/store', 'RegisterController@store');
        Route::post('/sms', 'RegisterController@sms');

        Route::get('/focus', 'RegisterController@focus');
        Route::get('/error', 'RegisterController@error');
        Route::get('/excess', 'RegisterController@excess');
    });

    Route::group(['prefix' => 'eduction'], function () {
        Route::get('/essay', 'EductionController@essay');
        Route::get('/injection', 'EductionController@injection');
        Route::get('/game', 'EductionController@game');
    });

    Route::group(['prefix' => 'shop'], function () {
        Route::get('/index', 'ShopController@index');
        Route::get('/index', 'ShopController@orders');
        Route::get('/index', 'ShopController@addresses');
    });

    Route::group(['prefix' => 'personal'], function () {
        Route::get('/information', 'PersonalController@information');
        Route::get('/beans', 'PersonalController@beans');
        Route::get('/friend', 'PersonalController@friend');
    });
});
