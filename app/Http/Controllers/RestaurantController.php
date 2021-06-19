<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Product;
use App\Type;

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
        return view('pages.restaurant-public', compact('restaurants'));
    }

    // Pagina di prova del carello per gli piatti del ristorante
    public function restaurantDetailsPublic($id){
        $restaurant = Restaurant::findOrFail($id);
        return view('pages.restaurant-product-public', compact('restaurant'));
    }
}
