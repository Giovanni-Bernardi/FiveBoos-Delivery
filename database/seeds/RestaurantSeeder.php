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

        factory(Restaurant::class, 21)->create() -> each(function($restaurant) {
            $categories = Category::all();
            $user = User::all();
            switch ($restaurant['business_name']) {

                case 'Fratelli La Bufala':
                    // $restaurant -> user() -> associate($user[1]);
                    // $restaurant -> save();
                    $restaurant -> categories() -> attach($categories[6]);
                    $restaurant -> categories() -> attach($categories[1]);
                    $restaurant -> save();
                    break;
                
                case 'Piedra del Sol':
                    $restaurant -> categories() -> attach($categories[4]);
                    $restaurant -> categories() -> attach($categories[7]);
                    $restaurant -> save();
                    break;

                case 'Piadina e Crescione':
                    $restaurant -> categories() -> attach($categories[3]);
                    $restaurant -> categories() -> attach($categories[6]);
                    $restaurant -> save();
                    break;
                case 'Fu Lu Shou':
                    $restaurant -> categories() -> attach($categories[2]);
                    $restaurant -> categories() -> attach($categories[1]);
                    $restaurant -> save();
                    break;
                case 'Shiroya':
                    $restaurant -> categories() -> attach($categories[8]);
                    $restaurant -> categories() -> attach($categories[5]);
                    $restaurant -> save();
                    break;
                case 'Hawaii Poke Fish':
                    $restaurant -> categories() -> attach($categories[7]);
                    $restaurant -> categories() -> attach($categories[5]);
                    $restaurant -> save();
                    break;
                case 'Ristorante Alla Griglia':
                    $restaurant -> categories() -> attach($categories[1]);
                    $restaurant -> categories() -> attach($categories[5]);
                    $restaurant -> save();
                    break;
                case 'Roadhouse':
                    $restaurant -> categories() -> attach($categories[1]);
                    $restaurant -> categories() -> attach($categories[3]);
                    $restaurant -> save();
                    break;
                case 'La Dolce Vita':
                    $restaurant -> categories() -> attach($categories[0]);
                    $restaurant -> categories() -> attach($categories[6]);
                    $restaurant -> save();
                    break;
                case 'Margy Burger':
                    $restaurant -> categories() -> attach($categories[3]);
                    $restaurant -> categories() -> attach($categories[4]);
                    $restaurant -> save();
                    break;
                case 'Manzo Steakhouse':
                    $restaurant -> categories() -> attach($categories[1]);
                    $restaurant -> categories() -> attach($categories[0]);
                    $restaurant -> save();
                    break;
                case 'When Zhou':
                    $restaurant -> categories() -> attach($categories[2]);
                    $restaurant -> categories() -> attach($categories[3]);
                    $restaurant -> save();
                    break;
                case 'Los Chicos':
                    $restaurant -> categories() -> attach($categories[4]);
                    $restaurant -> save();
                    break;
                case "McDonald's":
                    $restaurant -> categories() -> attach($categories[3]);
                    $restaurant -> save();
                    break;
                case 'Gelateria Il Dolce Sorriso':
                    $restaurant -> categories() -> attach($categories[0]);
                    $restaurant -> save();
                    break;
                case 'Burger King':
                    $restaurant -> categories() -> attach($categories[3]);
                    $restaurant -> save();
                    break;
                case 'VEG-Joy':
                    $restaurant -> categories() -> attach($categories[9]);
                    $restaurant -> save();
                    break;
                case 'Sushi Wagashi':
                    $restaurant -> categories() -> attach($categories[8]);
                    $restaurant -> categories() -> attach($categories[7]);
                    $restaurant -> save();
                    break;
                case 'El Habanero':
                    $restaurant -> categories() -> attach($categories[8]);
                    $restaurant -> categories() -> attach($categories[7]);
                    $restaurant -> save();
                    break;
                case 'BioPizza Italia':
                    $restaurant -> categories() -> attach($categories[6]);
                    $restaurant -> save();
                    break;
                case 'Veganità':
                    $restaurant -> categories() -> attach($categories[9]);
                    $restaurant -> categories() -> attach($categories[0]);
                    $restaurant -> save();
                    break;
            }
        });
    }
}
