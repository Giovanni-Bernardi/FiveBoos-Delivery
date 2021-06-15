<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\Restaurant;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Type::class, 15) -> create() -> each(function ($type){
            $restaurants = Restaurant::inRandomOrder()
                    -> limit(rand(1,3))
                    -> get();
            $type -> restaurants() -> attach($restaurants);
            $type -> save();
        });

    }
}
