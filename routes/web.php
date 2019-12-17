<?php

//Todo:: use route group
Route::resource('jobs','JobController')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
