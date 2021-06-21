<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Product;
use App\Type;
use App\Order;

class RestaurantController extends Controller
{
    public function indexView(){
        $restaurants = Restaurant::all();
        $types = Type::all();

        return view('pages.index', compact('restaurants', 'types'));
    }
    public function restaurantDetailsView($id){
        $restaurant = Restaurant::findOrFail($id);
        return view('pages.restaurant-details', compact('restaurant'));
    }

    public function productDetailsView($id){
        $product = Product::findOrFail($id);

        return view('pages.product-details', compact('product'));
    }

    // Pagina di prova del carello per tutti ristoranti
    public function restaurantPublic(){
        $restaurants = Restaurant::all();
        $products = Product::all();
        $orders = Order::all();
        return view('pages.restaurant-public', compact('restaurants', 'products', 'orders'));
    }

    // Pagina di prova del carello per gli piatti del ristorante
    public function restaurantDetailsPublic($id){
        $restaurant = Restaurant::findOrFail($id);
        $products = Product::all();
        $orders = Order::all();
        return view('pages.restaurant-product-public', compact('restaurant', 'products', 'orders'));
    }

    public function storeOrder(Request $request) {
        // $products = Product::all();

        $validate = $request -> validate([
          'firstname' => 'required|string|min:3',
          'lastname' => 'required|string|min:3',
          'email' => 'required|string',
          'telephone' => 'required|string',
          'address' => 'required|string',
          'delivery_date' => 'required|date',
          'total_price' => 'required|integer'
        ]);

        $restaurant = Restaurant::findorFail($request -> get('restaurant_id'));

        $order = Order::make($validate);
        $product -> restaurant() -> associate($restaurant);
        $order -> save();

        $order -> products() -> attach($request -> get('products_id'));
        $order -> save();

        return redirect() -> route('indexViewLink');
    }
}
