<?php

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

Route::get('/', function () {
    return view('welcome');
});


    // admin画面用
    Route::prefix(ADMIN_URL_PREFIX)
        ->namespace('Admin')
        ->group(function () {

            // アカウント管理
            Route::get('/',       'TopController@index')->name('admin.top')->middleware('auth.admin.check');
            Route::get('/login',  'AuthController@index')->name('admin.login');
            Route::post('/login', 'AuthController@authenticate');
            Route::get('/logout', 'AuthController@logout');

        }
    );

    // フロント画面用
    Route::prefix('')
        ->namespace('Front')
        ->group(function () {

            // アカウント管理
            Route::get('/', 'TopController@index')->name('front.top');
        }
    );