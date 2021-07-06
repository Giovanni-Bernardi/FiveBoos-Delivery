<?php

namespace App\Http\Controllers;

//Importa la nostra mail blade.
use Illuminate\Support\Facades\Mail;
// Serve per mandare email al utente logato(al suo email)
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Restaurant;
use App\Product;
use App\Category;
use App\Order;

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
        if (count($request -> category_id) > 3) {
            return redirect() -> route('restaurantProfileViewLink');
        }

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

        // dd($request -> file('img_background'));
        if ($request -> file('img_background')) {
            $img = $request -> file('img_background');
            $imgExt = $img -> getClientOriginalExtension();
            $imgNewName = time() . rand(0, 1000). '.' . $imgExt;
            $folder = '/restaurant-img/';
            $imgFile = $img -> storeAs($folder, $imgNewName, 'public');
            $restaurant -> img_background = $imgNewName;
        }
        $restaurant -> save();

        return redirect() -> route('restaurantDetailsProfileLink', Crypt::encrypt($restaurant -> id));
    }

    public function storeProduct(Request $request, $id) {

        $validate = $request -> validate([
          'name' => 'required|string|min:3',
          'ingredients' => 'required|string',
          'description' => 'required|string',
          'price' => 'required|integer',
        ]);

        $restaurant = Restaurant::findorFail($id);
        $product = Product::make($validate);
        $product -> restaurant() -> associate($restaurant);
        $product -> visible = 1;

        if($request -> file('img')){
            $img = $request -> file('img');
            $imgExt = $img -> getClientOriginalExtension();
            $imgNewName = time() . rand(0, 1000) . '.' . $imgExt;
            $folder = '/product-img/';
            $imgFile = $img -> storeAs($folder, $imgNewName, 'public');
            $product -> img = $imgNewName;
        }

        $product -> save();

        return redirect() -> route('restaurantDetailsProfileLink', Crypt::encrypt($product -> restaurant -> id));
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
            'category_id' => 'required|exists:categories,id',
        ]);

        if (count($request -> category_id) > 3 || count($request -> category_id) < 1) {
            return redirect() -> route('restaurantDetailsProfileLink', Crypt::encrypt($id));
        }

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

        if ($request -> file('img_background')) {
            $img = $request -> file('img_background');
            $imgExt = $img -> getClientOriginalExtension();
            $imgNewName = time() . rand(0, 1000). '.' . $imgExt;
            $folder = '/restaurant-img/';
            $imgFile = $img -> storeAs($folder, $imgNewName, 'public');
            $restaurant -> img_background = $imgNewName;
        }
        $restaurant -> save();

        return redirect() -> route('restaurantDetailsProfileLink', Crypt::encrypt($restaurant -> id));
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

        return redirect() -> route('restaurantDetailsProfileLink', Crypt::encrypt($product -> restaurant -> id));
    }

    // Visibilità ristorante
    public function deleteRestaurant($id){
        $user_id = Auth::id();
        $restaurant = Restaurant::findOrFail($id);

        if($user_id == $restaurant -> user_id){
            $restaurant -> visible = !($restaurant -> visible);
            $restaurant -> save();
            return redirect() -> route('restaurantProfileViewLink');
        }else{
            return redirect() -> route('indexViewLink', $id);
        }
    }

    // Visibilità product
    public function deleteProduct($id){
        $user_id = Auth::id();

        $product = Product::findOrFail($id);

        if($user_id == $product -> restaurant -> user_id){
            $product -> visible = !($product -> visible);
            $product -> save();
            return redirect() -> route('restaurantDetailsProfileLink', Crypt::encrypt($product -> restaurant -> id));
        }else{
            return redirect() -> route('indexView');
        }

    }

    // Soft Delete ristorante
    public function realDeleteRestaurant($id){
        $user_id = Auth::id();
        $restaurant = Restaurant::findOrFail($id);

        if($user_id == $restaurant -> user_id){
            $restaurant -> visible = 0;
            $restaurant -> deleted = 1;
            $restaurant -> save();
            return redirect() -> route('restaurantProfileViewLink');
        }else{
            return redirect() -> route('indexViewLink', $id);
        }
    }

    // Soft Delete prodotto
    public function realDeleteProduct($id){
        $user_id = Auth::id();
        $product = Product::findOrFail($id);
        
        if($user_id == $product -> restaurant -> user_id){
            $product -> visible = 0;
            $product -> deleted = 1;
            $product -> save();
            return redirect() -> route('restaurantDetailsProfileLink', Crypt::encrypt($product -> restaurant -> id));
        }else{
            return redirect() -> route('indexView');
        }
    }

    // Pagina profilo ristoratore loggato
    public function restaurantProfileView(){
        $userId = Auth::id();
        $restaurants = Restaurant::where("restaurants.user_id", $userId) -> get();

        return view('pages.my-profile', compact('restaurants'));
    }

    public function restaurantDetailsProfileView($restaurantId){
        $restaurantId = Crypt::decrypt($restaurantId);
        $restaurant = Restaurant::findOrFail($restaurantId);
        $categories = Category::all();
        
        $orders = Order::select('orders.id' ,'orders.total_price', 'orders.delivery_date', 'orders.payment_status')
        -> groupBy('orders.id')
        -> join('order_product', 'orders.id', '=', 'order_product.order_id')
        -> join('products', 'order_product.product_id', '=', 'products.id')
        -> where ('products.restaurant_id', $restaurantId)
        -> orderBy('orders.id', 'DESC')
        -> get();

        return view('pages.restaurant-profile-details', compact('restaurant', 'orders', 'categories'));
    }
}
