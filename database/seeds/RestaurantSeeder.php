<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use App\User;

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
            $user = User::inRandomOrder() -> first(); // Elemento casuale
            $restaurant -> user() -> associate($user);
            $restaurant -> save(); 
        });
    }
}
