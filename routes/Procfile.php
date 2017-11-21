<?php

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('dashboard');

