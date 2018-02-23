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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth.basic')->get('/role', function (\App\Role $roles) {
    return $roles->all();
});
Route::middleware('auth.basic')->namespace('Admin')->resource('/users','Admin\UsersController');


Route::get('/users/{userId}/events','EventsController@myEvents');
Route::put('/events/{id}/restore','EventsController@restore');
Route::resources( [
    'events' => 'EventsController',
    'notes' => 'NotesController',
] );

Route::get('roles', function (){
    return App\Role::all();
});