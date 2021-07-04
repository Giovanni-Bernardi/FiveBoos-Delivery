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
        // factory(Product::class,15) -> make() -> each(function($product){
        //     $restaurant = Restaurant::inRandomOrder() -> first();
        //     $product -> restaurant() -> associate($restaurant);
        //     $product -> save();
        // });


        $products = [
            [
                'name' => 'Tasty fries',
                'ingredients' => 'Patatine fritte , bacon grigliato , salsa Cheddar , salsa OWW',
                'description' => 'Patate* Premium fries ricoperte da mix di formaggi, salsa Cheddar e bacon grigliato, servite con salsa OWW',
                'price' => 450,
                'visible'  => 1,
                'restaurant_id' => 1,
            ],
            [
                'name' => 'Gringos nachos',
                'ingredients' => 'Triangoli di mais , salsa messicana , salsa Guacamole , Peri Cheddar',
                'description' => 'Triangolini di mais con salse tipiche messicane (Guacamole homemade, salsa Messicana e Peri Cheddar)',
                'price' => 450,
                'visible'  => 1,
                'restaurant_id' => 1,
            ],
            [
                'name' => 'Onion rings',
                'ingredients' => 'Anelli di cipolla , salsa Barbecue',
                'description' => 'Anelli di cipolla* pastellati e fritti, serviti con salsa Barbecue (8 pezzi)',
                'price' => 500,
                'visible'  => 1,
                'restaurant_id' => 2,
            ],
            [
                'name' => 'Mozzarella Sticks',
                'ingredients' => 'Mozzarella , salsa OWW',
                'description' => 'Bastoncini* di mozzarella pastellati e fritti serviti con salsa OWW (6 pezzi) ',
                'price' => 500,
                'visible'  => 1,
                'restaurant_id' => 2,
            ],
            [
                'name' => 'Chicken Wings',
                'ingredients' => 'Pollo , peperoncino, salsa OWW',
                'description' => 'Alette di pollo* fritte particolarmente speziate, leggermente piccanti e servite con salsa OWW (8 pezzi)',
                'price' => 900,
                'visible'  => 1,
                'restaurant_id' => 3,
            ],
            [
                'name' => 'Chicken Nuggets',
                'ingredients' => 'Pollo , mais, salsa OWW',
                'description' => 'Bocconcini di pollo fritti, ricoperti di fiocchi di mais tostati, serviti con salsa OWW (8 pezzi)',
                'price' => 800,
                'visible'  => 1,
                'restaurant_id' => 3,
            ],
        ];
        
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
