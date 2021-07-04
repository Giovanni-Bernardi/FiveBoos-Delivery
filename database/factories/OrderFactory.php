<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'firstname' => $faker -> firstName,
        'lastname' => $faker -> lastName,
        'email' => $faker-> unique() -> safeEmail,
        'telephone' => '+39 ' . $faker -> numberBetween(300000000, 399999999) . $faker -> randomNumber(1),
        'address' => $faker -> address(),
        'delivery_date' => $faker -> dateTimeBetween("-3 years"),
        'delivery_time' => $faker -> time(),
        'total_price' => $faker -> numberBetween(500, 30000),
        'payment_status' => 1,
    ];
});
