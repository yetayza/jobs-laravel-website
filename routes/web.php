<?php

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth'], function ()
{
    Route::resource('jobs','JobController');
    Route::get('/home', 'HomeController@index')->name('home');
});

//Todo:: use route group
// Route::resource('jobs','JobController')->middleware('auth');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
