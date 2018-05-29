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




Route::fallback(function(){
    return response()->json(['message' => 'Not Found!'], 404);
});

Route::get('/', function (){
    return ['status'=>'200',
            'message'=>'Hello user in to Bajer API! Place to administrator for more info.'
        ];
});
// Restore user password
Route::post('auth/password/email', 'Auth\ForgotPasswordController@getResetToken');
Route::post('auth/password/reset', 'Auth\ResetPasswordController@reset');
//login user
Route::post('auth/login', 'AuthController@login');
Route::post('auth/logout', 'AuthController@logout');
Route::post('auth/register', 'Auth\RegisterController@register');
// auth group
Route::group([
    'middleware' => 'auth.api',
    'prefix' => 'auth'], function ($router) {
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});

//social auth
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');

//
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

});

Route::resources([
    'events' => 'EventsController',
    'notes' => 'NotesController',
]);

