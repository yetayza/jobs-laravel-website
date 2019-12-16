<?php

Route::resource('jobs','JobController');

Route::get('/', function () {
    return view('welcome');
});
