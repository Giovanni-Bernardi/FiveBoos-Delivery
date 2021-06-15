<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Restaurant;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class,100) -> make() -> each(function($product){
            $restaurant = Restaurant::inRandomOrder() -> first();
            $product -> restaurant() -> associate($restaurant);
            $product -> save();
        });
    }
}
