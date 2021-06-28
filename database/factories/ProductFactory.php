<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker -> word,
        'ingredients' => $faker -> sentence(5),
        'description' => $faker -> sentence(10),
        'price' => $faker -> numberBetween(1, 50),
        // 'visible' => $faker -> numberBetween(0, 1),
        'visible' => 1
    ];
});
