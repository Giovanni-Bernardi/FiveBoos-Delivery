<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$autoIncrement = autoIncrement();

$factory->define(Restaurant::class, function (Faker $faker) use ($autoIncrement) {
    // return [
    //     'business_name' => $faker -> word,
    //     'piva' => 'IT' . $faker -> randomNumber(9) . $faker -> randomNumber(2),
    //     'address' => $faker -> address(),
    //     'description' => $faker -> sentence(40),
    //     'telephone' => '+39' . $faker -> numberBetween(300000000, 399999999) . $faker -> randomNumber(1),
    // ];
    $restaurants = [
        [
            'business_name' => 'Pizzeria Napoli In Bocca',
            'piva' => 'IT' . rand(1000000000, 1999999999) . rand(1,9),
            'address' => 'Via San Carlo, 15',
            'description' => 'La vera Pizza di Napoli la puoi assaporare solo da noi. Come la preferisci? Con il bordo alto o altissimo? Ogni giorno i nostri fornitori di fiducia ci forniscono i migliori prodotti Campani. Ciro, al forno a legna, vi farà sentire il vero sapore di una pizza ormai dimenticata da tempo. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili. ',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => '',
            'img_background' => '',
            'visible' => 1,
            'user_id' => 1,
            'deleted' => 0,
            // category => Pizza, Carne.
        ],
        [
            'business_name' => 'Piedra del Sol',
            'piva' => 'IT' . rand(1000000000, 1999999999) . rand(1,9),
            'address' => 'Via Emilio Cornalia, 2',
            'description' => 'Siamo una famiglia di origini Messicana trasferita in Italia dal 1999. Le nostre tradizioni portate finalmente in Europa. Il Messicano più buono del territorio è solo da noi. Prova i nostri piatti e sarai trasportato in un secondo dall’altra parte del mondo. Puoi scegliere tra un piccante soft fino ad arrivare ad un piccante hard. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili. ',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => '',
            'img_background' => '',
            'visible' => 1,
            'user_id' => 1,
            'deleted' => 0,
            // category => Messicano, Poke
        ],
        [
            'business_name' => 'Piadina e Crescione',
            'piva' => 'IT' . rand(1000000000, 1999999999) . rand(1,9),
            'address' => 'Via Venezia, 20',
            'description' => 'Sei un appassionato del Fast-Food? Non puoi perderti i nostri panini. Puoi scegliere gli ingredienti più saporiti e speciali che desideri. Abbiamo introdotto una novità che siamo sicuri ti sorprenderà: i nostri fritti sono preparati con una friggitrice ad aria, rendendo quindi il prodotto più salutare. Mangiane quanti ne vuoi senza sentirti in colpa. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili. ',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => '',
            'img_background' => '',
            'visible' => 1,
            'user_id' => 1,
            'deleted' => 0,
            // category =>
        ],
    ];

    $autoIncrement -> next();
    $index = $autoIncrement -> current();
    // $index = $faker -> unique() -> numberBetween(0,19);
    $restaurant = $restaurants[$index];
    return [
        'business_name'=> $restaurant['business_name'],
        'piva'=> $restaurant['piva'],
        'address' => $restaurant['address'],
        'description'=> $restaurant['description'],
        'telephone'=> $restaurant['telephone'],
        'img'=> $restaurant['img'],
        'img_background'=> $restaurant['img_background'],
        'visible' => $restaurant['visible'],
        'user_id' => $restaurant['user_id'],
        'deleted' => $restaurant['deleted'],
    ];

});

function autoIncrement() {
    for ($i = -1; $i < 3; $i++) {
         yield $i;
     }
}