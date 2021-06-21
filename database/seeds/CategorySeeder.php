<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Restaurant;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 10) -> create() -> each(function ($type){
            $restaurants = Restaurant::inRandomOrder()
                    -> limit(rand(1,10))
                    -> get();
            $type -> restaurants() -> attach($restaurants);
            $type -> save();
        });
    }
}
