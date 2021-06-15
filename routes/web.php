<?php

use Illuminate\Support\Facades\Route;

// Route di default che sarà da eliminare
Route::get('/', function () {
    return view('welcome');
});

// Route princilape (Home)
Route::get('/index','RestaurantController@indexView') -> name('indexViewLink');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
