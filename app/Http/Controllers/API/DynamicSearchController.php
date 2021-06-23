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
        json_encode($categories);
        return $categories;
    }
    public function getAllRestaurants(){
        // $restaurantsList = array();
        // $prova = [];
        // $resStructure = [
        //     'id' => $restaurant -> id,
        //     'address' => $restaurant -> address,
        //     'business_name' => $restaurant -> business_name,
        //     'category'=> [
        //         'id' => '',
        //         'name' => ''
        //     ],
        //     'description'=> $restaurant -> description,
        //     'img'=> $restaurant -> img,
        //     'telephone'=> $restaurant -> telephone,
        // ];
        // $prova = [];

        // $restaurants = DB::table('restaurants')
        //             -> join('category_restaurant', 'restaurants.id', '=', 'category_restaurant.restaurant_id')
        //             -> join('categories', 'category_restaurant.category_id', '=', 'categories.id')
        //             -> select('restaurants.id','restaurants.business_name','restaurants.address','restaurants.telephone','restaurants.img', 'restaurants.description', 'categories.name as category_name', 'categories.id as category_id')
        //             // -> orderBy('restaurants.id', 'asc')
        //             -> groupBy('restaurants.id')
        //             -> get();

        $restaurants = Restaurant::all();
        // $categories = Category::all();
        $category_restaurant = [];
        
        foreach ($restaurants as $restaurant) {
            $query = DB::table('category_restaurant') 
                                -> join('categories', 'category_restaurant.category_id', '=', 'categories.id')
                                -> select('category_restaurant.restaurant_id as res_id','categories.id', 'categories.name')
                                -> where('category_restaurant.restaurant_id', $restaurant -> id)
                                -> get();
            array_push($category_restaurant, $query);
        }

        for ($i=0; $i < count($restaurants); $i++) { 
            // $restaurants[$i]['category'] = [ 'id' => 0];
            for ($j=0; $j < count($category_restaurant[$i]); $j++) { 
                // if(count($restaurants[$i]['category']) <1){
                //     $restaurants[$i]['category'] = [
                //         'id' => $category_restaurant[$i][$j] ->id
                //     ];
                // }
            }
            // $restaurants[$i]['category'] [] = [ 'id' => 0];
            // $restaurants[$i]['category'] = [
            //     'id' => $category_restaurant[$i]['id'],
            // ];
        }

        // json_encode($restaurants);
        // json_encode($restaurantsList);
        return [$restaurants, $category_restaurant];
        // return $restaurants[0] -> category;
        // return $category_restaurant[0]['id'];
        // return json_encode($category_restaurant[0][0] -> id);
        // return [$restaurants, $restaurantsList, $prova];
    }
}
