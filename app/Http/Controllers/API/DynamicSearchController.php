<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Restaurant;

class DynamicSearchController extends Controller
{
    public function getCategories(){
        $categories = Category::all();
        return json_encode($categories);
    }

    // Funzione che torna tutti i ristoranti in ordine random
    public function getAllRestaurants(){
        $restaurants = Restaurant::inRandomOrder() ->get();

        foreach ($restaurants as $restaurant) {
            $restaurant -> categories;
        }
        return json_encode($restaurants);
    }

    public function getFilteredRestaurants($filter){
        // Ristoranti filtrati da tornare
        $meltedRestaurants = [];
        $filteredRestaurants = [];
        $query = [];
        $array = [];
        $cont = 0;
        $pushIt;

        // Creazione array di ID categoria da stringa di numeri ($filter)
        $filterArray = explode(',', $filter);
        
        for ($i=0; $i < count($filterArray); $i++) { 
            $category_restaurant = DB::table('restaurants') 
                        -> join('category_restaurant','restaurants.id', '=', 'category_restaurant.restaurant_id')
                        -> select('restaurants.id','category_restaurant.category_id')
                        -> where('category_restaurant.category_id', $filterArray[$i])
                        -> get();
            $query [] = $category_restaurant;
        }

        // Push elemento solo se è presente in ogni "query" (Filtraggio)
        foreach ($query[0] as $value) {
            $cont = 0;
            foreach ($query as $outerArray) {
                foreach ($outerArray as $confrontValue) {
                    if($confrontValue -> id == $value -> id){
                        $cont ++;
                    }
                }
                if($cont == count($query)){
                    $meltedRestaurants [] = $value;
                }
            }
        }

        // Ricerca ristoranti che corrispondono con la query di filtraggio
        foreach ($meltedRestaurants as $restaurant) {
            $getRestaurants = Restaurant::where('id', $restaurant -> id)
                        -> get();
            $getRestaurants[0] -> categories;
            $filteredRestaurants[] = $getRestaurants[0];
        }
        
        return  json_encode($filteredRestaurants);
    }
}
