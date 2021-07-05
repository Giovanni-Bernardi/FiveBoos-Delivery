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
            'business_name' => 'Fratelli La Bufala',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via San Carlo, 15',
            'description' => 'La vera Pizza di Napoli la puoi assaporare solo da noi. Come la preferisci? Con il bordo alto o altissimo? Ogni giorno i nostri fornitori di fiducia ci forniscono i migliori prodotti Campani. Ciro, al forno a legna, vi farà sentire il vero sapore di una pizza ormai dimenticata da tempo. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili. ',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'fratelli-la-bufala.jpg',
            'img_background' => 'fratelli-di-bufala.png',
            'visible' => 1,
            'user_id' => 1,
            'deleted' => 0,
            // category => Pizza, Carne.
        ],
        [
            'business_name' => 'Piedra del Sol',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Emilio Cornalia, 2',
            'description' => 'Siamo una famiglia di origini Messicana trasferita in Italia dal 1999. Le nostre tradizioni portate finalmente in Europa. Il Messicano più buono del territorio è solo da noi. Prova i nostri piatti e sarai trasportato in un secondo dall’altra parte del mondo. Puoi scegliere tra un piccante soft fino ad arrivare ad un piccante hard. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili. ',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'piedra-del-sol.jpg',
            'img_background' => 'piedra-del-sol.png',
            'visible' => 1,
            'user_id' => 1,
            'deleted' => 0,
            // category => Messicano, Poke
        ],
        [
            'business_name' => 'Piadina e Crescione',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Venezia, 20',
            'description' => 'Sei un appassionato del Fast-Food? Non puoi perderti le nostre fantastiche piadine. Puoi scegliere gli ingredienti più saporiti e speciali che desideri. Abbiamo introdotto una novità che siamo sicuri ti sorprenderà: i nostri fritti sono preparati con una friggitrice ad aria, rendendo quindi il prodotto più salutare. Mangiane quanti ne vuoi senza sentirti in colpa. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili. ',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'piadina-e-crescione.jpg',
            'img_background' => 'piadina-e-crescione.png',
            'visible' => 1,
            'user_id' => 1,
            'deleted' => 0,
            // category => Fast-food, Pizza
        ],
        [
            'business_name' => 'Fu Lu Shou',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Braghetta, 1',
            'description' => 'Il ristorante Cinese che aspettavi è finalmente arrivato nella tua Città. Zin Yao diplomato nella più prestigiosa scuola di Shanghai vi farà assaporare i veri piatti della cucina Cinese. Ogni mese introduciamo delle novità lasciandoti sempre un ampio margine di scelta. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'fu-lo-shou.jpg',
            'img_background' => 'fu-lo-shou.png',
            'visible' => 1,
            'user_id' => 1,
            'deleted' => 0,
            // category => Cinese, Carne
        ],
        [
            'business_name' => 'Shiroya',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Dei Baullari, 147a',
            'description' => 'Il vero ristorante Giapponese che desideravi adesso è diventato realtà. Suri Yamamoto è una cuoca con 25 anni di esperienza nella preparazione di piatti tipici della cucina del Sol Levante. Siamo sicuri che una volta che assaggerai i nostri Nigiri non potrai più farne a meno. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili. ',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'shiroya.jpg',
            'img_background' => 'Shiroya.png',
            'visible' => 1,
            'user_id' => 2,
            'deleted' => 0,
            // category => Sushi, Pesce
        ],
        [
            'business_name' => 'Hawaii Poke Fish',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Ponte di Tappia, 70',
            'description' => 'Siamo specializzati in Poke. Prepariamo tutti i nostri piatti come tradizione comanda. Lo sapevi che il Poke nasce nei più antichi porti Asiatici? I Pescatori al ritorno dal duro lavoro si preparavano dei piatti di pesce fresco istantanei tagliuzzando a dadini i prodotti appena pescati, vi faremo vivere quell’esperienza.. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'hawaii-poke-fish.jpg',
            'img_background' => 'hawaii-poke-fish.png',
            'visible' => 1,
            'user_id' => 2,
            'deleted' => 0,
            // category => Poke, Pesce
        ],
        [
            'business_name' => 'Ristorante Alla Griglia',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via dei Banchi, 25',
            'description' => 'Steak house di origine Argentina cerca appassionati di CARNE.. Possiamo preparare tutti i piatti che desideri, sceglie dal nostro Menù un’infinità di prelibatezze. Selezioniamo solamente le migliori parti di carne importate qui in Europa. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'ristorante-alla-griglia.jpg',
            'img_background' => 'ristorante-alla-griglia.png',
            'visible' => 1,
            'user_id' => 2,
            'deleted' => 0,
            // category => Carne, Pesce
        ],
        [
            'business_name' => 'Roadhouse',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Pulcinella, 21',
            'description' => 'Solo con carni selezionate da bovini 100% nazionali, dalla nascita all’allevamento! Per i
            nostri fritti scegliamo solo olio di semi di girasole altoleico e linoleico: per questo sono così fragranti! Tante proposte sfiziose e di qualità, promozioni quotidiane e offerte dedicate: Roadhouse è questo ma anche tanto altro. Abbiamo scelto di essere un ristorante in cui la qualità non si assaggia solamente al tavolo ma anche nei servizi, nell’atmosfera e nelle facilities tecnologiche che ti offriamo, per questo siamo il ristorante che non c’era.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'roadhouse.jpg',
            'img_background' => 'roadhouse.png',
            'visible' => 1,
            'user_id' => 2,
            'deleted' => 0,
            // category => Carne, fast-food
        ],
        [
            'business_name' => 'La Dolce Vita',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => "Piazza Unità d'Italia, 3",
            'description' => 'Benvenuto nel nostro ristorante. Per noi la cucina è uno stile di vita. Non farti sfuggire nulla dalla nostra scelta di pietanze. Rimarrai sorpreso dall’inconfondibile gusto della vera cucina Italiana. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'la-dolce-vita.jpg',
            'img_background' => 'la-dolce-vita.png',
            'visible' => 1,
            'user_id' => 2,
            'deleted' => 0,
            // category => Bakery, Pizza
        ],
        [
            'business_name' => 'Margy Burger',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Piazza Santo Stefano, 2',
            'description' => 'Margy Burger è finalmente approdato su Fiveboo’s. Prova i nostri Big Panini con dentro 250 gr di carne Italiana. Da oggi introduciamo anche i panini di pesce. Non farti sfuggire nulla delle nostre tante prelibatezze. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'margy-burger.jpg',
            'img_background' => 'margy-burgers.png',
            'visible' => 1,
            'user_id' => 3,
            'deleted' => 0,
            // category => Fast-Food, Messicano
        ],
        [
            'business_name' => 'Manzo Steakhouse',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Cesare da Sesto, 1',
            'description' => 'Benvenuti a casa nostra. Con le nostre carni proviamo a farvi rivivere i sapori della
            tradizione come nonna Concetta ci ha insegnato. Utilizziamo solo carni provenienti da animali allevati con prodotti Bio certificati e a km 0. I nostri
            fornitori sono tutti piccoli imprenditori locali che dedicano alla terra e agli animali tanta passione e amore.
            Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto
            utilizziamo solamente vaschette 100% biodegradabili.
    ',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'manzo-steakhouse.jpg',
            'img_background' => 'steakhouse.png',
            'visible' => 1,
            'user_id' => 3,
            'deleted' => 0,
            // category => Carne, Bakery
        ],
        [
            'business_name' => 'When Zhou',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via di Tor Pignattara, 50',
            'description' => 'I piatti tipici della cucina popolare Cinese direttamente a casa tua. Per cucinare i tuoi
            piatti preferiti abbiamo chiamato Lim Zeen, rinomato cuoco di Pechino. Friggiamo i nostri prodotti con olio EVO
            Italiano per farti vivere un’esperienza unica. Tutto questo lo trovi solo da When Zhou.
            Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto
            utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'when-zhou.jpg',
            'img_background' => 'When Zhou.png',
            'visible' => 1,
            'user_id' => 3,
            'deleted' => 0,
            // category => Cinese, Fast-Food
        ],
        [
            'business_name' => 'Los Chicos',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via dei Benci, 15',
            'description' => 'Lasciati conquistare dai nostri piatti cucinati con passione e professionalità. Agustin, il
            nostro cuoco di fiducia vi farà assaggiare dei piatti che difficilmente dimenticherete. Non dimenticare di
            ordinare il salmone in crosta di sesamo, il nostro cavallo di battaglia.
            Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto
            utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'los-chicos.jpg',
            'img_background' => 'los-chicos.png',
            'visible' => 1,
            'user_id' => 3,
            'deleted' => 0,
            // category => Messicano
        ],
        [
            'business_name' => "McDonald's",
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Piazza delle Cinque Lune, 74',
            'description' => 'La più grande catena di ristoranti di fast food di origine statunitense è finalemte arrivata nella tua città. Il sapore inconfondibile dei nostri panini da oggi arriva direttamente a casa tua. Non farti sfuggire le nuove patatine con formaggio Cheddar, in edizione limitata per tutta la summer 2021.
            Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'mc-donalds.jpg',
            'img_background' => 'mc-donalds.png',
            'visible' => 1,
            'user_id' => 4,
            'deleted' => 0,
            // category => Fast-Food
        ],
        [
            'business_name' => 'Gelateria Il Dolce Sorriso',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Torcegno, 41',
            'description' => 'Da noi troverai il vero gusto del gelato artigianale. La nostra è una ricetta antica che risale al 1912. Abbiamo inoltre tantissimi gusti senza lattosio, prova il più grande assortimento di gelati alla frutta della tua città.  Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili che manterranno il tuo gelato al fresco.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'gelateria-il-dolce-sorriso.jpg',
            'img_background' => 'il-dolce-sorriso.png',
            'visible' => 1,
            'user_id' => 4,
            'deleted' => 0,
            // category => Bakery
        ],
        [
            'business_name' => 'Burger King',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Piazzale Appio, 2',
            'description' => 'La più grande catena di Fast-Food ti da il benvenuto. Da Burger King potrai soddisfare anche
            il palato dei più piccoli, abbiamo introdotto una vasta gamma di panini anche per loro. Non farti sfuggire la
            nostra fantastica panatura Crispy. Prova il nuovo Crispy Fried Chicken, non potrai più farne a meno.
            Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto
            utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'burger-king.jpg',
            'img_background' => 'burger-king.png',
            'visible' => 1,
            'user_id' => 4,
            'deleted' => 0,
            // category => Fast-Food
        ],
        [
            'business_name' => 'VEG-Joy',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Vasto, 4',
            'description' => 'Lasciatevi trasportare dal sapore della nostra cucina vegana. Siamo un piccolo ristorante a gestione
            famigliare. Maria ai fornelli mette tutta la sua passione ed esperienza. Cuciniamo secondo la tradizione del
            nostro territorio.
            Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto
            utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'VEG-joy.jpg',
            'img_background' => 'veg-joy.png',
            'visible' => 1,
            'user_id' => 4,
            'deleted' => 0,
            // category => Vegan
        ],
        [
            'business_name' => 'Sushi Wagashi',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => "Piazza Unità d'Italia, 10",
            'description' => 'Sei un appassionato di pesce crudo? Sei nel posto giusto. Tutto il pescato del giorno che ci
            viene dato dai nostri fornitori viene abbattuto secondo le norme HACCP per farti assaggiare dei piatti di crudo
            in totale tranquillità. Non dimenticare di assaggiare il nostro branzino sfilacciato e marinato in una salsa
            Vichinga. Ti porteremo indietro nel tempo. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente
            da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'sushi-wagashi.jpg',
            'img_background' => 'sushi-wagashi.png',
            'visible' => 1,
            'user_id' => 4,
            'deleted' => 0,
            // category => Sushi, Poke
        ],
        [
            'business_name' => 'El Habanero',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Fornace Braccini, 32',
            'description' => 'Tutto il sapore del Messico è finalmente arrivato nella tua zona. Lasciati trasportare dai
            sapori inconfondibili degli antichi Maya. Potrai assaporare i veri piatti antichi. Non potrai più farne a meno.
            Tutto questo lo trovi solo da El Habanero.
            Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto
            utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'El-habanero.jpg',
            'img_background' => 'el habanero.png',
            'visible' => 1,
            'user_id' => 5,
            'deleted' => 0,
            // category => Messicano
        ],
        [
            'business_name' => 'BioPizza Italia',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Tiburtina, 822',
            'description' => 'Benvenuti a casa nostra. Con le nostre fantastiche pizze proviamo a farvi rivivere i sapori della
            tradizione Napoletana come nonna Concetta ci ha insegnato. Utilizziamo solo prodotti Bio certificati e a km 0. I nostri
            fornitori sono tutti piccoli imprenditori locali che dedicano alla terra e agli animali tanta passione e amore.
            Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto
            utilizziamo solamente vaschette 100% biodegradabili.',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'biopizza-italia.jpg',
            'img_background' => 'bio-pizza.png',
            'visible' => 1,
            'user_id' => 5,
            'deleted' => 0,
            // category => Pizza
        ],
        [
            'business_name' => 'Veganità',
            'piva' => 'IT' . rand(1000000000, 1999999999). rand(0, 9),
            'address' => 'Via Michelangelo Buonarroti, 16',
            'description' => 'Veganità è l’alternativa che cercavi per noi che abbiamo scelto di essere vegani per preservare ogni essere vivente. Da Veganità ogni piatto è preparato con amore nel rispetto della tua scelta di vita. Anche per chi si approccia a noi come prima esperienza promettiamo di non deludervi, non sentirai la mancanza delle proteine animai. Grazie al nostro partner Fiveboo’s potete ordinare tutto comodamente da casa vostra. Per il trasporto utilizziamo solamente vaschette 100% biodegradabili. ',
            'telephone' => '+39' . rand(300000000, 399999999) . rand(0, 1),
            'img' => 'veganità.jpg',
            'img_background' => 'veganita.png',
            'visible' => 1,
            'user_id' => 5,
            'deleted' => 0,
            // category => Vegan, Bakery
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
    for ($i = -1; $i < 21; $i++) {
         yield $i;
     }
}