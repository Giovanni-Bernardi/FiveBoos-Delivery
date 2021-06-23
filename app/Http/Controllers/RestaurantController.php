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
    //pagina landing page
    public function indexView(){
        $restaurants = Restaurant::all();
        $categories = Category::all();

        return view('pages.index', compact('restaurants', 'categories'));
    }
    //pagina restaurant list
    public function restaurantListView(){
        $restaurants = Restaurant::all();
        $categories = Category::all();
        
        return view('pages.restaurant-list', compact('restaurants', 'categories'));
    }
    //pagina restaurant details
    public function restaurantDetailsView($id){
        $restaurant = Restaurant::findOrFail($id);
        return view('pages.restaurant-details', compact('restaurant'));
    }
    //pagina Profilo Ristoratre loggato
    public function restaurantProfileView($id){
        $restaurant = Restaurant::findOrFail($id);
        return view('pages.my-profile', compact('restaurant'));
    }
    //pagina product details
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
          'delivery_date' => '|date',
        ]);

        $order = Order::make($validate);

        // Funzione per calcolare il prezzo, che non si puo modificare.
        $totalPrice = 0;
        for($i=0;$i<count($request->products_id);$i++){
            $productId = $request->products_id[$i];
            $priceQuery = DB::table("products") -> select('products.price') -> where("id", $productId) -> get();
            $price = $priceQuery[0] -> price;
            $totalPrice += $price;
        }

        $order -> total_price = $totalPrice;
        $order -> save();

        $order -> products() -> attach($request -> get('products_id'));
        $order -> save();

        return redirect() -> route('indexViewLink');
    }
}
