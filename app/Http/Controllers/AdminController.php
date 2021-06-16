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

        // passo l'img del form dell html in file
        $img = $request -> file('img');

        // mi estraggo l'extension del file
        $imgExt = $img -> getClientOriginalExtension();

        // modifico nome img
        $imgNewName = time() . rand(0, 1000). '.' . $imgExt;

        // creo il percorso
        $folder = '/restaurant-img/';

        // e le salvo lato server
        $imgFile = $img -> storeAs($folder, $imgNewName, 'public');

        $restaurant -> img = $imgNewName;

        $restaurant -> save();


        // dd($img, $imgNewName, $imgFile);



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
        ]);

        $restaurant = Restaurant::findorFail($request -> get('restaurant_id'));

        // $img = $request -> file('image');
        // $imgExt = $img -> getClientOriginalExtension();
        // $imgNewName = time() . rand(0, 1000) . '.' . $imgExt;
        // $folder = '/car-img/';
        // $imgFile = $img -> storeAs($folder, $imgNewName, 'public');

        $product = Product::make($validate);
        $product -> restaurant() -> associate($restaurant);
        // $product -> img = $imgNewName;
        $product -> save();

        // $car -> pilots() -> attach($request -> get('pilots_id'));
        // $car -> save();

        return redirect() -> route('createProduct');
        // return redirect() -> route('restaurantDetailsViewLink');
    }

}
