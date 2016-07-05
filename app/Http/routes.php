<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'isroleadmin'], function () {
    Route::group(['prefix' => 'admin','namespace' => 'Admin'],function () {
        Route::get('index',[
            'as' => 'index',
            'uses' => 'AdminController@index'
        ]);
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'user','namespace' => 'User'], function () {
        Route::get('index',[
            'as' => 'index',
            'uses' => 'UserController@index'
        ]);
    });
});
