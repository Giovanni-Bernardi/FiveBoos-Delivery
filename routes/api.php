<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('restaurants', 'API\RestaurantController');
Route::apiResource('products', 'API\ProductController');
Route::apiResource('types', 'API\TypeController');

// Route::namespace('Api')->group(function() {
//     Route::get('/restaurants', 'RestaurantController@restaurants'); // restituisce tutte le cit per l'anno selezionato
// });
