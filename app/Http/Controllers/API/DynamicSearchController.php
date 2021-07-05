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

    // Funzione che torna tutti i ristoranti con almeno 1 product (visible) in ordine random
    public function getAllRestaurants(){
        $restaurants = Restaurant::inRandomOrder() ->get();
        $restaurantsWithProducts = [];

        foreach ($restaurants as $restaurant) {
            $cont = 0;
            foreach ($restaurant -> products as $product) {
                if ($product -> visible == 1) {
                    $cont++;
                }
            }
            if ($cont > 0) {
                $restaurant -> categories;
                $restaurant -> products;
                $restaurantsWithProducts[] = $restaurant;
            }
        }

        return $restaurantsWithProducts;
    }

    public function getFilteredRestaurants($filter){
        // Ristoranti filtrati da tornare
        $meltedRestaurants = [];
        $filteredRestaurants = [];
        $finalFilteredRestaurants = [];
        $query = [];
        $array = [];
        $cont = 0;
        $pushIt;

        // Creazione array di ID categoria da stringa di numeri ($filter)
        $filterArray = explode(',', $filter);
        
        for ($i=0; $i < count($filterArray); $i++) { 
            $category_restaurant = Restaurant::inRandomOrder()
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

        // Array finale con ristoranti che hanno almeno 1 prod. visible
        foreach ($filteredRestaurants as $restaurant) {
            $cont = 0;
            foreach ($restaurant -> products as $product) {
                if ($product -> visible == 1) {
                    $cont++;
                }
            }
            if ($cont > 0) {
                $restaurant -> products;
                $finalFilteredRestaurants[] = $restaurant;
            }
        }
        
        return $finalFilteredRestaurants    ;
    }
}
