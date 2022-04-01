<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MovieController@index')->name('movie.index');
Route::get('/movie/{movie}', 'MovieController@show')->name('movie.show');

Route::get('/actors', 'ActorsController@index')->name('actors.index');
Route::get('/actors/page/{page?}', 'ActorsController@index');
Route::get('/actors/{actor}', 'ActorsController@show')->name('actors.show');