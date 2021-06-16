<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editRestaurantView($id){
        $restaurant = Restaurant::findOrFail($id);

        return view('pages.restaurant-edit', compact('restaurant'));
    }

    public function editProductView($id){
        $product = Product::findOrFail($id);

        return view('pages.product-edit', compact('product'));
    }
    
}