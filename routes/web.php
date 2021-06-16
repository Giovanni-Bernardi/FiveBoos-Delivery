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

// CREA SINGOLO RISTORANTE
Route::get('restaurant-create', 'AdminController@createRestaurant') -> name('createRestaurant');
Route::post('restaurant-store', 'AdminController@storeRestaurant') -> name('storeRestaurant');

// Route per creazione di Product
Route::get('/create/product', 'AdminController@createProduct') -> name('createProduct');
Route::post('/store/product', 'AdminController@storeProduct') -> name('storeProduct');
