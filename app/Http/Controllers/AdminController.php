<?php

namespace App\Http\Controllers;

//Importa la nostra mail blade.
use Illuminate\Support\Facades\Mail;
// Serve per mandare email al utente logato(al suo email)
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Restaurant;
use App\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // CREA SINGOLO RISTORANTE
    public function createRestaurant()
    {
        return view('pages.restaurant-create');
    }
    // ---------------------------------
    public function storeRestaurant(Request $request)
    {
        // dd($request -> all());
        $validate = $request -> validate([
        'business_name' => 'required|string',
        'piva' => 'required|string',
        'address' => 'required|string',
        'description' => 'required|string',
        'telephone' => 'required|string',
        ]);
        // dd($validate);
        $restaurant = Restaurant::make($validate);

        $id = Auth::id();

        $restaurant -> user() -> associate($id);

        $restaurant -> save();

        // dd($request -> file('img'));
        if ($request -> file('img')) {
            $img = $request -> file('img');
            $imgExt = $img -> getClientOriginalExtension();
            $imgNewName = time() . rand(0, 1000). '.' . $imgExt;
            $folder = '/restaurant-img/';
            $imgFile = $img -> storeAs($folder, $imgNewName, 'public');
            $restaurant -> img = $imgNewName;
            $restaurant -> save();
        }

        return redirect() -> route('indexViewLink');
    }

    public function createProduct() {

        $id = Auth::id();
        $restaurants = Restaurant::All() -> where('user_id', $id);
        return view('pages.createProduct', compact('restaurants'));
    }

    public function storeProduct(Request $request) {

        $validate = $request -> validate([
          'name' => 'required|string|min:3',
          'ingredients' => 'required|string',
          'description' => 'required|string',
          'price' => 'required|integer',
          'visible' => 'required|boolean',
          'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        $restaurant = Restaurant::findorFail($request -> get('restaurant_id'));
        
        $product = Product::make($validate);
        $product -> restaurant() -> associate($restaurant);

        if($request -> file('img')){
            $img = $request -> file('img');
            $imgExt = $img -> getClientOriginalExtension();
            $imgNewName = time() . rand(0, 1000) . '.' . $imgExt;
            $folder = '/product-img/';
            $imgFile = $img -> storeAs($folder, $imgNewName, 'public');
            $product -> img = $imgNewName;
        }

        $product -> save();

        return redirect() -> route('productDetailsViewLink', $product -> id);
    }

    public function editRestaurantView($id){

        $restaurant = Restaurant::findOrFail($id);
        return view('pages.restaurant-edit', compact('restaurant'));
    }
    // ----------------------
    public function updateRestaurantView(Request $request, $id) {

        // dd($request -> all(), $id);

        $validate = $request -> validate([
            'business_name' => 'required|string',
            'piva' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'telephone' => 'required|string',
        ]);
        $restaurant = Restaurant::findOrFail($id);

        $restaurant -> update($validate);

        $restaurant -> save();

        if ($request -> file('img')) {
            $img = $request -> file('img');
            $imgExt = $img -> getClientOriginalExtension();
            $imgNewName = time() . rand(0, 1000). '.' . $imgExt;
            $folder = '/restaurant-img/';
            $imgFile = $img -> storeAs($folder, $imgNewName, 'public');
            $restaurant -> img = $imgNewName;
            $restaurant -> save();
        }

        return redirect() -> route('restaurantDetailsViewLink', $restaurant -> id);
    }


    public function editProductView($id){

        $product = Product::findOrFail($id);
        return view('pages.product-edit', compact('product'));
    }

    public function updateProductView(Request $request, $id) {

        $validate = $request -> validate([
            'name' => 'required|string|min:3',
            'ingredients' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'visible' => 'required|boolean',
        ]);

        $product = Product::findorFail($id);
        
        if($request -> file('img')){
            $img = $request -> file('img');
            $imgExt = $img -> getClientOriginalExtension();
            $imgNewName = time() . rand(0, 1000) . '.' . $imgExt;
            $folder = '/product-img/';
            $imgFile = $img -> storeAs($folder, $imgNewName, 'public');
            $product -> img = $imgNewName;
        }
        $product -> update($validate);
        $product -> save();

        return redirect() -> route('productDetailsViewLink', $product -> id);
    }

    // Soft delete ristorante
    public function deleteRestaurant($id){
        $restaurant = Restaurant::findOrFail($id);
        $restaurant -> visible = !($restaurant -> visible);

        $restaurant -> save();

        return redirect() -> route('indexViewLink');
    }

    // Soft delete product
    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $product -> visible = !($product -> visible);

        $product -> save();

        return redirect() -> route('restaurantDetailsViewLink', $product -> restaurant -> id);
    }
}
