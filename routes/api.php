<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products/{id}','API\ProductController@index') -> name('indexapi');

// Route che torna tutte le categorie
Route::get('/get/categories','API\DynamicSearchController@getCategories') -> name('getCategoriesLink');

// Route che torna tutti i ristoranti
Route::get('/get/all/restaurants','API\DynamicSearchController@getAllRestaurants') -> name('getAllRestaurantsLink');