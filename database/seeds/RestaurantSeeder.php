<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use App\User;
use App\Category;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Restaurant::class,25) -> make() -> each(function($restaurant){
        //     $user = User::inRandomOrder() -> first();
        //     $restaurant -> user() -> associate($user);
        //     $restaurant -> save();
        //     $category = Category::inRandomOrder()
        //             -> limit(rand(1, 3))
        //             -> get();
        //     $restaurant -> categories() -> attach($category);
        //     $restaurant -> save();
        // });

        factory(Restaurant::class, 3)->create() -> each(function($restaurant) {
            $categories = Category::all();
            $user = User::all();
            switch ($restaurant['business_name']) {

                case 'Pizzeria Napoli In Bocca':
                    // $restaurant -> user() -> associate($user[1]);
                    // $restaurant -> save();
                    $restaurant -> categories() -> attach($categories[1]);
                    $restaurant -> categories() -> attach($categories[6]);
                    $restaurant -> save();
                    break;
                
                case 'Piedra del Sol':
                    // $restaurant -> user() -> associate($user[1]);
                    // $restaurant -> save();
                    $restaurant -> categories() -> attach($categories[4]);
                    $restaurant -> categories() -> attach($categories[7]);
                    $restaurant -> save();
                    break;

                case 'Piadina e Crescione':
                    // $restaurant -> user() -> associate($user[1]);
                    // $restaurant -> save();
                    $restaurant -> categories() -> attach($categories[0]);
                    $restaurant -> categories() -> attach($categories[1]);
                    $restaurant -> save();
                    break;
            }
        });
    }
}
