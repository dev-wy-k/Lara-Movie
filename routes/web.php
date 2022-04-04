<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MovieController@index')->name('movie.index');
Route::get('/page/{page?}', 'MovieController@index');
Route::get('/movie/{movie}', 'MovieController@show')->name('movie.show');

Route::get('/tv', 'TvController@index')->name('tv.index');
Route::get('/tv/page/{page?}', 'TvController@index');
Route::get('/tv/{movie}', 'TvController@show')->name('tv.show');

Route::get('/actors', 'ActorsController@index')->name('actors.index');
Route::get('/actors/page/{page?}', 'ActorsController@index');
Route::get('/actors/{actor}', 'ActorsController@show')->name('actors.show');

Route::get('/about', function(){
    return view('about.index');
})->name('about.index');