<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Restaurant;

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
}