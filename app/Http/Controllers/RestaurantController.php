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
        session()->forget(['products', 'total_price']);

        $restaurants = Restaurant::all();
        $categories = Category::all();

        return view('pages.index', compact('restaurants', 'categories'));
    }
    //pagina restaurant list
    public function restaurantListView($filter){
        session()->forget(['products', 'total_price']);
        if ($filter == 'all') {
            $filter = '';
        }

        $restaurants = Restaurant::all();
        $categories = Category::all();

        return view('pages.restaurant-list', compact('restaurants', 'categories', 'filter'));
    }
    //pagina restaurant details
    public function restaurantDetailsView($id){
        session()->forget(['products', 'total_price']);
        
        $restaurant = Restaurant::findOrFail($id);
        $products = DB::table("products") -> where("restaurant_id", $id) -> get();
        return view('pages.restaurant-details', compact('restaurant', 'products'));
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

    //
    public function storeOrder(Request $request) {
        // Pulizia session
        session()->forget(['products', 'total_price']);
        $productsArray = [];

        // Push prodotti del carrello in array fittizio
        foreach ($request -> products_id as $product_id) {
            $productsArray [] = $product_id;
        }
        sort($productsArray);

        // Push id prodotti (ordinati ASC) del carrello in session (array)
        foreach ($productsArray as $product) {
            session() -> push('products', $product);
        }

        $totalPrice = 0;
        for($i=0;$i<count($request->products_id);$i++){
            $productId = $request->products_id[$i];
            $priceQuery = DB::table("products") -> select('products.price') -> where("id", $productId) -> get();
            $price = $priceQuery[0] -> price;
            $totalPrice += $price;
        }

        $request -> session() -> push('total_price', $totalPrice);
        return redirect() -> route('payOrder');
    }
}
