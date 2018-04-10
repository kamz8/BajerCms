<?php

use Illuminate\Http\Request;

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

/*Route::post('register', 'AuthController@register');

Route::post('recover', 'AuthController@recover');*/
Route::post('auth/login', 'AuthController@login');
//social auth
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');

Route::get('/', function (){
    return ['status'=>'200',
            'message'=>'Hello user in to Bajer API! Send to administrator to credential.'
        ];
});

Route::group([
    'middleware' => 'auth.api',
    'prefix' => 'auth'], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

});

Route::group(['middleware' => 'auth.api'],function($router){
    Route::namespace('Admin')->resource('/users','Admin\UsersController');
    Route::get('/users/{userId}/events','EventsController@myEvents');
    Route::put('/events/{id}/restore','EventsController@restore');

    Route::get('/role', function (\App\Role $roles) {
        return $roles->all();
    });

    Route::get('users', function () {
        return \App\User::with('roles')->get();
    });

    Route::get('roles', function (){
        return App\Role::all();
    });

    Route::resources([
        'events' => 'EventsController',
        'notes' => 'NotesController',
    ]);
});

Route::fallback(function(){
    return response()->json(['message' => 'Not Found!'], 404);
});