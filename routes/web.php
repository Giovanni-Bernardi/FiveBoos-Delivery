<?php

use Illuminate\Support\Facades\Route;

// Route di default che sarà da eliminare
Route::get('/', function () {
    return view('welcome');
});

// Route princilape (Home)
Route::get('/index','RestaurantController@indexView') -> name('indexViewLink');

// Route dettaglio ristorante con lista prodotti
Route::get('/restaurant/{id}','RestaurantController@restaurantDetailsView') -> name('restaurantDetailsViewLink');
// Route edit ristorante
Route::get('/edit/restaurant/{id}','AdminController@editRestaurantView') -> name('editRestaurantViewLink');
// Route salvataggio/store edit ristorante
// Route::post('/store/restaurant/{id}','AdminController@editRestaurantView') -> name('editRestaurantViewLink');

// Route dettaglio prodotto
Route::get('/restaurant/product/{id}','RestaurantController@productDetailsView') -> name('productDetailsViewLink');
// Route edit prodotto
Route::get('/edit/product/{id}','AdminController@editProductView') -> name('editProductViewLink');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
