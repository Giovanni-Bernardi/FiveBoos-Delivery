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
            ['name' => 'bakery'],
            ['name' => 'carne'],
            ['name' => 'cinese'],
            ['name' => 'fast-food'],
            ['name' => 'messicano'],
            ['name' => 'pesce'],
            ['name' => 'pizza'],
            ['name' => 'poke'],
            ['name' => 'sushi'],
            ['name' => 'vegan'],
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
