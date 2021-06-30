<?php

use Illuminate\Support\Facades\Route;

// Route di default che sarà da eliminare
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route Lista Ristoranti
Route::get('/restaurant/list', 'RestaurantController@restaurantListView')->name('restaurantListLink');

// Route per pagina di Login
Route::get('/home', 'HomeController@index')->name('home');

// Route principale (Home)
Route::get('/index','RestaurantController@indexView') -> name('indexViewLink');

// Route dettaglio ristorante con lista prodotti
Route::get('/restaurant/{id}','RestaurantController@restaurantDetailsView') -> name('restaurantDetailsViewLink');

// Route profilo ristoratore loggato
Route::get('/user/profile', 'AdminController@restaurantProfileView')->name('restaurantProfileViewLink');

// Route profilo ristoratore loggato
Route::get('/user/profile/restaurant/{restaurantId}', 'AdminController@restaurantDetailsProfileView')->name('restaurantDetailsProfileLink');

// Route dettaglio piatto
Route::get('/restaurant/product/{id}','RestaurantController@productDetailsView') -> name('productDetailsViewLink');

// Route per creazione di Restaurant
Route::get('/create/restaurant', 'AdminController@createRestaurant') -> name('createRestaurant');
Route::post('/store/restaurant', 'AdminController@storeRestaurant') -> name('storeRestaurant');

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

// Route pay
Route::get('pay/','PaymentController@payOrder') -> name('payOrder');

// Route checkout
Route::post('checkout/','PaymentController@checkoutOrder') -> name('checkoutOrder');
Route::get('byebye','PaymentController@byebyeOrder') -> name('byebyeOrder');

// 2 Route per carello temporanee
Route::get('/all/public','RestaurantController@restaurantPublic') -> name('restaurantPublicLink');
Route::get('/all/public/{id}','RestaurantController@restaurantDetailsPublic') -> name('restaurantDetailsPublicLink');

// Route dell'ordine
Route::post('/store/order', 'RestaurantController@storeOrder') -> name('storeOrder');

// Route grafico ordini 12 mesi per anno
Route::get('/stats/month/{restaurantId}/{selectedYear}/{type}','StatisticCharController@getOrdersMonths') -> name('statsMonthLink');
