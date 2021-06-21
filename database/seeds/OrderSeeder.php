<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Product;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 250) -> create() -> each(function ($order){
            $products = Product::inRandomOrder()
                    -> limit(rand(1, 10))
                    -> get();
            $order -> products() -> attach($products);
            $order -> save();
        });
    }
}
