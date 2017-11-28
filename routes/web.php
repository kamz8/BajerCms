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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'],function () {
    Route::get('/', function (){
        return view('admin.dashboard');
    })->name('dashboard');
});
//auth routes
Auth::routes();

Route::get('/', function (){
    return view('welcome');
})->name('home');
