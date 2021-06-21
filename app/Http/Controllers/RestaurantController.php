<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Restaurant;
use App\Product;
use App\Category;
use App\Order;

class RestaurantController extends Controller
{
    public function indexView(){
        $restaurants = Restaurant::all();
        $categories = Category::all();

        return view('pages.index', compact('restaurants', 'categories'));
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

        return view('pages.restaurant-public', compact('restaurants'));
    }

    // Pagina di prova del carello per gli piatti del ristorante
    public function restaurantDetailsPublic($id){
        $restaurant = Restaurant::findOrFail($id);
        $products = DB::table("products") -> where("restaurant_id", $id) -> get();

        return view('pages.restaurant-product-public', compact('restaurant', 'products'));
    }

    public function storeOrder(Request $request) {

        $validate = $request -> validate([
          'firstname' => 'required|string|min:3',
          'lastname' => 'required|string|min:3',
          'email' => 'required|string',
          'telephone' => 'required|string',
          'address' => 'required|string',
          'delivery_date' => 'required|date',
          'total_price' => 'required|integer'
        ]);

        $order = Order::make($validate);
        $order -> save();

        $order -> products() -> attach($request -> get('products_id'));
        $order -> save();

        return redirect() -> route('indexViewLink');
    }
}
