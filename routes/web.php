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

Route::group(['middleware'=>'roles',
    'roles'=>['super_admin','admin','moderator','consultant'],
    'prefix' => 'admin', 'namespace' => 'Admin'],
    function () {

    Route::get('/', function (){
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('users','UsersController');
});
//auth routes
Auth::routes();

Route::get('/', function (){
    return view('welcome');
})->name('home');


Route::prefix('api')->group(function () {
    Route::get('users', function () {
        return \App\User::with('roles')->get();
    });
});

Route::get('/notification', function () {
    return view('notify');
});
