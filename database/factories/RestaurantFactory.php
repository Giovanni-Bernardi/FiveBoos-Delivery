<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'business_name' => $faker -> word,
        'piva' => 'IT' . $faker -> randomNumber(9) . $faker -> randomNumber(2),
        'address' => $faker -> address(),
        'description' => $faker -> sentence(40),
        'telephone' => '+39' . $faker -> numberBetween(300000000, 399999999) . $faker -> randomNumber(1),
    ];
});
