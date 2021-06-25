<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Restaurant;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'bakery',
                'img' => 'cake.png'
            ],
            [
                'name' => 'carne',
                'img' => 'meat.png'
            ],
            [
                'name' => 'cinese',
                'img' => 'japanese.png'
            ],
            [
                'name' => 'fast-food',
                'img' => 'hamburger.png'
            ],
            [
                'name' => 'messicano',
                'img' => 'mexican.png'
            ],
            [
                'name' => 'pesce',
                'img' => 'fish.png'
            ],
            [
                'name' => 'pizza',
                'img' => 'pizza.png'
            ],
            [
                'name' => 'poke',
                'img' => 'veg.png'
            ],
            [
                'name' => 'sushi',
                'img' => 'sushi.png'
            ],
            [
                'name' => 'vegan',
                'img' => 'apple.png'
            ],
        ];

        foreach ($categories as $category) {
            $query = DB::table('categories') -> insert(
                ['name' => $category]
            );
        }

        // factory(Category::class, 10) -> create() -> each(function ($type){
        //     $restaurants = Restaurant::inRandomOrder()
        //             -> limit(rand(1,10))
        //             -> get();
        //     $type -> restaurants() -> attach($restaurants);
        //     $type -> save();
        // });
    }
}
