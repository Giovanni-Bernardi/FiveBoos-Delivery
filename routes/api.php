<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('restaurants', 'API\RestaurantController');
Route::apiResource('products', 'API\ProductController');
Route::apiResource('types', 'API\TypeController');
