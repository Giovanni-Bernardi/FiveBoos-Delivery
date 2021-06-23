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
        factory(Restaurant::class,25) -> make() -> each(function($restaurant){
            $user = User::inRandomOrder() -> first();
            $restaurant -> user() -> associate($user);
            $restaurant -> save();
            $category = Category::inRandomOrder()
                    -> limit(rand(1, 2))
                    -> get();
            $restaurant -> categories() -> attach($category);
            $restaurant -> save();
        });
    }
}
