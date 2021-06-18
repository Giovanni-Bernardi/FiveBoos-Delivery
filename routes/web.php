<?php

use Illuminate\Support\Facades\Route;

// Route di default che sarà da eliminare
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route per pagina di Login
Route::get('/home', 'HomeController@index')->name('home');

// Route princilape (Home)
Route::get('/index','RestaurantController@indexView') -> name('indexViewLink');

// Route dettaglio ristorante con lista prodotti
Route::get('/restaurant/{id}','RestaurantController@restaurantDetailsView') -> name('restaurantDetailsViewLink');

// Route dettaglio piatto
Route::get('/restaurant/product/{id}','RestaurantController@productDetailsView') -> name('productDetailsViewLink');

// Route per creazione di Restaurant
Route::get('restaurant-create', 'AdminController@createRestaurant') -> name('createRestaurant');
Route::post('restaurant-store', 'AdminController@storeRestaurant') -> name('storeRestaurant');

// Route per creazione di Product
Route::get('/create/product', 'AdminController@createProduct') -> name('createProduct');
Route::post('/store/product', 'AdminController@storeProduct') -> name('storeProduct');

// Route edit ristorante
Route::get('/edit/restaurant/{id}','AdminController@editRestaurantView') -> name('editRestaurantViewLink');
Route::post('/update/restaurant/{id}','AdminController@updateRestaurantView') -> name('updateRestaurantViewLink');

// Route edit product
Route::get('/edit/product/{id}','AdminController@editProductView') -> name('editProductViewLink');
Route::post('/update/product/{id}', 'AdminController@updateProductView') -> name('updateProductViewLink');

// Route delete ristorante
Route::get('/delete/restaurant/{id}','AdminController@deleteRestaurant') -> name('deleteRestaurantLink');

// Route delete product
Route::get('/delete/product/{id}','AdminController@deleteProduct') -> name('deleteProductLink');

// Route grafico TEST
Route::get('/stats/month/{restaurantId}','StatisticCharController@getOrdersMonths') -> name('statsMonthLink');