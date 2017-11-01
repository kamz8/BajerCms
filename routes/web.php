<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Procfile routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Procfile" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('admin.layouts.login');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>'auth'],function () {
    Route::get('/', function (){
        return view('admin.dashboard');
    })->name('dashboard');
});

//auth routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');