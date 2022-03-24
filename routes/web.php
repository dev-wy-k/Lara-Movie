<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MovieController@index')->name('movie.index');
Route::get('/movie/{movie}', 'MovieController@show')->name('movie.show');

