<?php

namespace App\Http\Controllers;

//Importa la nostra mail blade.
use Illuminate\Support\Facades\Mail;
// Serve per mandare email al utente logato(al suo email)
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Restaurant;
use App\Product;
use App\Category;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // CREA SINGOLO RISTORANTE
    public function createRestaurant()
    {
        $categories = Category::all();
        return view('pages.restaurant-create', compact('categories'));
    }
    // ---------------------------------
    public function storeRestaurant(Request $request)
    {
        $validate = $request -> validate([
        'business_name' => 'required|string',
        'piva' => 'required|string',
        'address' => 'required|string',
        'description' => 'required|string',
        'telephone' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        ]);
        $restaurant = Restaurant::make($validate);

        $id = Auth::id();

        $restaurant -> user() -> associate($id);
        $restaurant -> save();

        $restaurant -> categories() -> attach($request -> category_id);
        
        if ($request -> file('img')) {
            $img = $request -> file('img');
            $imgExt = $img -> getClientOriginalExtension();
            $imgNewName = time() . rand(0, 1000). '.' . $imgExt;
            $folder = '/restaurant-img/';
            $imgFile = $img -> storeAs($folder, $imgNewName, 'public');
            $restaurant -> img = $imgNewName;
        }
        $restaurant -> save();
        
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
        $categories = Category::all();

        return view('pages.restaurant-edit', compact('restaurant', 'categories'));
    }
    // ----------------------
    public function updateRestaurantView(Request $request, $id) {

        $validate = $request -> validate([
            'business_name' => 'required|string',
            'piva' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'telephone' => 'required|string',
        ]);
        $restaurant = Restaurant::findOrFail($id);

        $restaurant -> update($validate);

        $restaurant -> categories() -> sync($request -> category_id);
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
        $user_id = Auth::id();
        $restaurant = Restaurant::findOrFail($id);

        if($user_id == $restaurant -> user_id){
            $restaurant -> visible = !($restaurant -> visible);
            $restaurant -> save();
            return redirect() -> route('indexViewLink');
        }else{
            return redirect() -> route('editRestaurantViewLink', $id);
        }
    }

    // Soft delete product
    public function deleteProduct($id){
        $user_id = Auth::id();

        $product = Product::findOrFail($id);

        if($user_id == $product -> restaurant -> user_id){
            $product -> visible = !($product -> visible);
            $product -> save();
        }else{
            return redirect() -> route('editRestaurantViewLink', $product -> restaurant -> id);
        }

        return redirect() -> route('restaurantDetailsViewLink', $product -> restaurant -> id);
    }
}
