<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Restaurant;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Product::class,15) -> make() -> each(function($product){
        //     $restaurant = Restaurant::inRandomOrder() -> first();
        //     $product -> restaurant() -> associate($restaurant);
        //     $product -> save();
        // });
        
        $products = [
            //FAST-FOOD
            [
            //'id' => 1,
            //'categories' => Fast-Food
            'name' => 'Fries',
            'ingredients' => 'Patate, sale, pepe',
            'description' => 'Patine croccanti fritte al momento con sale marino e pepe nero',
            'price' => 300,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'fast (6).jpg',
            'restaurant_id' => 3,
        ],
        [
            //'id' => 2,
            //'categories' => Fast-Food
            'name' => 'Big Burger',
            'ingredients' => 'Pane, manzo(100%), bacon, cipolle, cheddar,',
            'description' => 'Bun burger a lievitazione naturale, hamburger di Fassona DOP 280g, bacon croccante, formaggio cheddar e cipolle caramellate',
            'price' => 750,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'fast (1).jpg',
            'restaurant_id' => 3,
        ],
        [
            //'id' => 3,
            //'categories' => Fast-Food
            'name' => 'Hot Dog',
            'ingredients' => 'Pane, wurstel (maiale), ketchup, maionese',
            'description' => 'Bun burger a lievitazione naturale, wurstel di maiale 100% italiano, ketchup, maionese',
            'price' => 500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'fast (3).jpg', //'/path/img',
            'restaurant_id' => 3,
        ],
        [
            //'id' => 5,
            //'categories' => Fast-food
            'name' => 'Toast',
            'ingredients' => 'Pane, prociutto arrosto, fontina',
            'description' => "Pan carre' a lievitazione naturale, prosciutto arrosto affucato e fontina DOP",
            'price' => 400,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'fast (17).jpg',
            'restaurant_id' => 8,
        ],
        [
            //'id' => 6,
            //'categories' => Fast-Food
            'name' => 'BBQ Burger',
            'ingredients' => 'Pane, carne (manzo), salsa BBQ, cipolle',
            'description' => 'Hamburger con deliziose fettine di formaggio Cheddar, salsa BBQ, rucola, cipolle crude e pomodoro',
            'price' => 600,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'bbq-burger.jpg',
            'restaurant_id' => 8,
        ],
        [
            //'id' => 7,
            //'categories' => Fast-Food
            'name' => 'Chicken Sandwich',
            'ingredients' => 'Pane, pollo, pomodoro',
            'description' => 'Tre fette di pane integrale tostato con pollo saltato, lattuga, pomodoro e maionese',
            'price' => 450,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'chicken-sandwitch.jpg',
            'restaurant_id' => 10,
        ],
        [
            //'id' => 8,
            //'categories' => Fast-Food
            'name' => 'Salmon Sandwiich',
            'ingredients' => 'Pane, pesce (salmone), pomodoro, uovo, formaggio',
            'description' => 'Tre fette di pane integrale tostato con cream cheese Philadelphia style, cipolla
            cruda, salmone, rucola, uovo sodo e pomodoro',
            'price' => 650,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'salmon-sanwitch.jpg',
            'restaurant_id' => 10,
        ],
        [
            //'id' => 9,
            //'categories' => Fast-Food
            'name' => 'Big Manzo',
            'ingredients' => 'Carne di Manzo, pomodoro',
            'description' => 'Burger di puro manzo al piatto, cotto alla perfezione e servito con insalata e pomodoro',
            'price' => 700,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'big-manzo.jpg',
            'restaurant_id' => 10,
        ],
        [
            //'id' => 10,
            //'categories' => Fast-Food
            'name' => 'Crispy Ham Sandwich',
            'ingredients' => 'Carne (maiale), pomodoro, rucola, cipolle',
            'description' => 'Tre fette di pane integrale tostato con prosciutto cotto, provola, pomodoro, rucola, crispy onions flakes e salsa 1950',
            'price' => 600,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'crispy ham sandwitch.jpg',
            'restaurant_id' => 12,
        ],
        [
            //'id' => 11,
            //'categories' => Fast-Food
            'name' => 'Cheese Burger',
            'ingredients' => 'Carne (Manzo), pomodoro, insalata, formaggio',
            'description' => 'Abbiamo arricchito il nostro hamburger con fettine di formaggio Cheddar, insalata e
            pomodoro',
            'price' => 650,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'cheese burger.jpg',
            'restaurant_id' => 12,
        ],
        [
            //'id' => 12,
            //'categories' => Fast-Food
            'name' => 'Vegeterian Sandwich',
            'ingredients' => 'Formaggio, uovo, pomodoro, insalata, funghi',
            'description' => 'tre fette di pane integrale tostato con pomodoro, scamorza, uovo sodo, insalata e salsa funghi',
            'price' => 550,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'vegetarian-sanwitch.jpg',
            'restaurant_id' => 14,
        ],
        [
            //'id' => 13,
            //'categories' => Fast-Food
            'name' => 'Robert Beef Burger ',
            'ingredients' => 'Carne (Manzo), formaggio, avocado, bacon',
            'description' => 'Dalla fantasia del mitico Robert, 230 gr di puro manzo del Bel Paese cucinati in
            pietra lavica, mexican guacamole di Avocado Hass, provolone filante affumicato D.O.P., bacon croccante,
            salsa Blue Cheese, insalata gentile e pomodorini',
            'price' => 850,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'robert burger.jpg',
            'restaurant_id' => 14,
        ],
        [
            //'id' => 14,
            //'categories' => Fast-Food
            'name' => '1950 D.O.C. Beef Burger',
            'ingredients' => 'Carne (Manzo), basilico, pomodoro',
            'description' => 'Burger dai profumi italiani, 230 gr di puro manzo del Bel Paese cucinati in pietra
            lavica, mozzarella di bufala campana DOC, fresca insalata gentile, pomodorini, foglie di basilico, olio EVO',
            'price' => 750,
            'visible'  => 1,
            'deleted' => 0,
            'img' => '9.jpg',
            'restaurant_id' => 14,
        ],
        [
            //'id' => 15,
            //'categories' => Fast-Food
            'name' => 'Nicky Beef Burger',
            'ingredients' => 'Carne (Manzo), tartufo, miele, formaggio tomino',
            'description' => '250 gr di puro manzo impastati a mano, croccanti cuori di insalata Iceberg, tartufo
            nero in crema, gustosissimo tomino piemontese fuso e impreziosito da gocce di miele',
            'price' => 750,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'nicky-beef-burger.jpg',
            'restaurant_id' => 14,
        ],
        [
            //'id' => 16,
            //'categories' => Fast-Food
            'name' => 'Scrambled Bun',
            'ingredients' => 'Uova, formaggio, funghi',
            'description' => 'Panino multicereali con uova strapazzate mantecate con formaggio Cheddar, prezzemolo,
            funghi trifolati e zucchine grigliate',
            'price' => 600,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'scrambled bun.jpg',
            'restaurant_id' => 14,
        ],
        [
            //'id' => 17,
            //'categories' => McDonalds
            'name' => 'Gran Crispy McBacon',
            'ingredients' => 'Carne Italiana, formaggio, salsa',
            'description' => 'Chi ama il Crispy McBacon ne prenderebbe volentieri un altro e un altro e un altro e
            un altro ancora. Per questo c’è il Gran Crispy McBacon: carne 100% bovina da allevamenti italiani,
            croccante bacon 100% da pancetta italiana, formaggio e salsa Crispy. Come il classico,
            ma ancora più grande.',
            'price' => 720,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'crispy-mc-bacon.jpg',
            'restaurant_id' => 16,
        ],
        [
            //'id' => 18,
            //'categories' => McDonalds
            'name' => 'McChicken Originale',
            'ingredients' => 'Pollo, insalata, salsa',
            'description' => 'Tutta la semplicità del petto di pollo con una panatura croccante insieme all’insalata
            iceberg e all’inconfondibile salsa McChicken. Basta questo per un Grande Classico dal gusto
            irresistibile.',
            'price' => 520,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'mc-chicken.jpg',
            'restaurant_id' => 16,
        ],
        [
            //'id' => 19,
            //'categories' => McDonalds
            'name' => 'Double Chicken BBQ',
            'ingredients' => 'Pollo, insalata, formaggio, salsa',
            'description' => 'Un must per tutti gli amanti del pollo. Due croccanti fette di pollo impanato fanno da
            base per il formaggio filante, per la lattuga fresca e per la salsa barbecue. Nasce così un Grande
            Classico dal gusto affumicato davvero irresistibile.',
            'price' => 640,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'double-chicken-bbq.jpg',
            'restaurant_id' => 16,
        ],
        [
            //'id' => 20,
            //'categories' => McDonalds
            'name' => 'Crispy Chicken McWrap',
            'ingredients' => 'Pollo, bacon, formaggio, salsa',
            'description' => 'Pollo 100% italiano, croccante bacon 100% da pancetta italiana, formaggio e
            l’inconfondibile salsa Crispy, avvolti in una fragrante tortilla.',
            'price' => 570,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'Mc-wrap.jpg',
            'restaurant_id' => 16,
        ],
        [
            //'id' => 21,
            //'categories' => McDonalds
            'name' => 'McToast',
            'ingredients' => 'Carne (Maiale), formaggio',
            'description' => 'Perché essere quadrati? Quando il profumo del prosciutto cotto si unisce alla dolcezza
            del formaggio fuso e a tutto il gusto McDonald’s, nasce McToast: il primo (e l’unico) Toast rotondo.',
            'price' => 570,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'McToast.jpg',
            'restaurant_id' => 16,
        ],

        //PIZZERIE
        [
            //'id' => 24,
            //'categories' => Pizzeria
            'name' => 'Margherita',
            'ingredients' => 'Pomodoro, mozzarella, basilico',
            'description' => 'Pizza con impasto lievitato almeno 24 ore, cotta a legna, tutti gli ingredienti sono di nostra produzione.',
            'price' => 500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'piz (22).jpg',
            'restaurant_id' => 1,
        ],
        [
            //'id' => 25,
            //'categories' => Pizzeria
            'name' => 'Diavola',
            'ingredients' => 'Pomodoro, mozzarella, salamino piccante, polvere di habanero',
            'description' => 'Pizza con impasto lievitato almeno 24 ore, cotta a legna, tutti gli ingredienti sono di nostra produzione.',
            'price' => 700,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'piz (1).jpg',
            'restaurant_id' => 1,
        ],
        [
            //'id' => 26,
            //'categories' => Pizzeria
            'name' => 'Chicago style',
            'ingredients' => 'Pomodoro, mozzarella, parmigiano,',
            'description' => 'Pizza con doppio impasto lievitato almeno 24 ore, cotta in padella di ghisa a bassa temperatura, tutti gli ingredienti sono di nostra produzione.',
            'price' => 900,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'piz (10).jpg',
            'restaurant_id' => 1,
        ],
        [
            //'id' => 27,
            //'categories' => Pizzeria
            'name' => 'Formaggiosa',
            'ingredients' => 'Pomodoro, mozzarella, parmigiano, fontina, gorgonzola piccante ',
            'description' => 'Pizza con impasto lievitato almeno 24 ore, cotta in padella di ghisa a bassa temperatura, tutti gli ingredienti sono di nostra produzione.',
            'price' => 700,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'piz (3).jpg',
            'restaurant_id' => 3,
        ],
        [
            //'id' => 28,
            //'categories' => Pizzeria
            'name' => 'Calzone farcito',
            'ingredients' => 'Pomodoro, mozzarella, parmigiano, funghi, prosciutto arrosto, scamorza affumicata',
            'description' => 'Calzone con impasto lievitato almeno 24 ore, cotta in padella di ghisa a bassa temperatura, tutti gli ingredienti sono di nostra produzione.',
            'price' => 800,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'piz (27).jpg',
            'restaurant_id' => 3,
        ],
        [
            //'id' => 29,
            //'categories' => Pizzeria
            'name' => 'Capricciosa',
            'ingredients' => 'Pomodoro, mozzarella, carciofini, uova, olive e prosiutto',
            'description' => 'Pizza integrale, cotta in forno a legna, tutti gli ingredienti sono di nostra produzione.',
            'price' => 750,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'capricciosa.jpg',
            'restaurant_id' => 9,
        ],
        [
            //'id' => 30,
            //'categories' => Pizzeria
            'name' => 'Vegetariana',
            'ingredients' => 'Zucchine, melanzane e peperoni',
            'description' => 'Una focaccia con olio EVO tutta vegetariana, non rinunciare mai alla pizza.',
            'price' => 650,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'vegetariana.jpg',
            'restaurant_id' => 9,
        ],
        [
            //'id' => 31,
            //'categories' => Pizzeria
            'name' => 'Boscaiola',
            'ingredients' => 'Mozzarella funghi e salsiccia',
            'description' => 'Un grande classico della pizza dal sapore inconfondibile.',
            'price' => 700,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'boscaiola.jpg',
            'restaurant_id' => 20,
        ],
        [
            //'id' => 31,
            //'categories' => Pizzeria
            'name' => 'Zuccosa',
            'ingredients' => 'Mozzarella Zucca e salsiccia',
            'description' => 'La classica pizza del contadino. Dal sapore autunnale inconfondibile.',
            'price' => 680,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'zuccosa.jpg',
            'restaurant_id' => 20,
        ],
        [
            //'id' => 32,
            //'categories' => Pizzeria
            'name' => 'Napoli',
            'ingredients' => 'Mozzarella, pomodoro, alici',
            'description' => 'Il sapore delle più buone alici del sud su una pizza dal bordo alto.',
            'price' => 750,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'napoli.jpg',
            'restaurant_id' => 20,
        ],
        [
            //'id' => 33,
            //'categories' => Pizzeria
            'name' => 'Origano Bio',
            'ingredients' => 'Pomodoro, origano',
            'description' => 'Pizza Bio dalla A alla Z. Tutti gli ingredienti di questa favolosa pizza provengono dai nostri fornitori locali.',
            'price' => 600,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'origano-bio.jpg',
            'restaurant_id' => 20,
        ],
        [
            //'id' => 34,
           //'categories' => Pizzeria
           'name' => 'Salmonata',
           'ingredients' => 'Salmone, robiola, insalata',
           'description' => 'Sapore di mare con salmone 100% selvaggio proveniente dalla Norvegia. Il sapore unico del vero salmone.',
           'price' => 800,
           'visible'  => 1,
           'deleted' => 0,
           'img' => 'salmonata.jpg',
           'restaurant_id' => 20,
        ],

        // SUSHI
        [
            //'id' => 32,
            //'categories' => Sushi
            'name' => 'Sushi mix',
            'ingredients' => 'Osomaki salmone-tonno-cetriolo, futomaki, nigiri tonno-salmone, spicy roll',
            'description' => 'Sushi misto 24pz',
            'price' => 1500,
            'visible'  => 1,
            'deleted' => 0,
            'img' =>'sush (1).jpg',
            'restaurant_id' => 5,
        ],
        [
            //'id' => 33,
            //'categories' => Sushi
            'name' => 'Carolina Roll',
            'ingredients' => 'Salmone, riso, philadelphia, alga nori',
            'description' => 'Roll 10pz',
            'price' => 600,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'sush (4).jpg',
            'restaurant_id' => 5,
        ],
        [
            //'id' => 34,
            //'categories' => Sushi
            'name' => 'Mango twist',
            'ingredients' => 'Salmone, riso, avocado, philadelphia, wasabi, alga nori, riduzione di mango',
            'description' => 'Rango twist 6pz con con di cipolle fritte ',
            'price' =>500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'sush (11).jpg',
            'restaurant_id' => 5,
        ],
        [
            //'id' => 35,
            //'categories' => Sushi
            'name' => 'Futomaki',
            'ingredients' => 'Salmone, riso, alga nori, panatura (farina di riso, pane, mais)',
            'description' => 'Roll fritto 8pz',
            'price' => 500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'sush (13).jpg',
            'restaurant_id' => 18,
        ],
        [
            //'id' => 36,
            //'categories' => Sushi
            'name' => 'Ramen',
            'ingredients' => 'Manzo, noodles, uova, naruto, cipollotto, brodo, germogli di soia',
            'description' => 'Ramen tradizionale giapponese (Okinawa)',
            'price' => 1000,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'sush (18).jpg',
            'restaurant_id' => 18,
        ],
        [
            //'id' => 37,
            //'categories' => Sushi
            'name' => 'Maki Misto',
            'ingredients' => 'Pesce, avocado, mango, alga',
            'description' => 'Maki 18 pezzi',
            'price' => 1100,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'maki-misto.jpg',
            'restaurant_id' => 18,
        ],

        // MESSICANO
        [
            //'id' => 39,
            //'categories' => Messicano
            'name' => 'Tortillas',
            'ingredients' => 'Manzo sfilacciato, avocado, cipolla bianca, salsa al mango',
            'description' => 'Tortillas fatte in casa con cottura alla piastra',
            'price' => 450,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'mex (2).jpg',
            'restaurant_id' => 2,
        ],
        [
            //'id' => 40,
            //'categories' => Messicano
            'name' => 'Nachos Vamos',
            'ingredients' => 'Nachos, jalapenoa fette, salsa burger, chilly con carne',
            'description' => 'Crunchy nachos cottura al forno, con chilly di carne a lenta cottura ',
            'price' => 350,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'mex (16).jpg',
            'restaurant_id' => 2,
        ],
        [
            //'id' => 41,
            //'categories' => Messicano
            'name' => 'Mexican fit meal',
            'ingredients' => 'Polpette, riso, piselli, avocado, brodo, jalapeno',
            'description' => 'Gustoso piatto completo a basso contenuno di grassi, elevato contenuto proteico e tanto gusto',
            'price' => 700,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'mex (11).jpg',
            'restaurant_id' => 2,
        ],
        [
            //'id' => 42,
            //'categories' => Messicano
            'name' => 'Summer burrito',
            'ingredients' => 'Pollo, riso, piadina, cipolla stufata, fagioli neri, peperoni rossi e gialli, lime',
            'description' => 'Burrito fresco e facile da mangiare, diviso in 4 porzioni, idele per estate',
            'price' => 700,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'mex (3).jpg',
            'restaurant_id' => 10,
        ],
        [
            //'id' => 43,
            //'categories' => Messicano
            'name' => 'Churros',
            'ingredients' => 'Churros, nutella o duche de leche o miele',
            'description' => 'Churros fritti al momento con zucchero e guarnizione a scelta',
            'price' => 400,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'mex (21).jpg',
            'restaurant_id' => 10,
        ],
        [
            //'id' => 44,
            //'categories' => Messicano
            'name' => 'Texas Burrito',
            'ingredients' => 'Pollo, peperoni, formaggio',
            'description' => 'Tortilla di farina extra large ripiena di pollo e peperoni saltata con mix di verdure
            homemade e formaggio Tex-Mex. Servita con patatine fritte, guacamole e sour cream.',
            'price' => 500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'Texasburito.jpg',
            'restaurant_id' => 13,
        ],
        [
            //'id' => 45,
            //'categories' => Messicano
            'name' => 'Fajutas de pollo',
            'ingredients' => 'Pollo, peperoni, guacamole, piccante',
            'description' => 'Deliziose striscioline di carne di pollo saltate in padella con un mix homemade di
            spezie, peperoni e cipolle. Servite con tortillas, guacamole, salsa rossa piccante, riso e sour cream.',
            'price' => 550,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'Fajutas-de-pollo.jpg',
            'restaurant_id' => 13,
        ],
        [
            //'id' => 46,
            //'categories' => Messicano
            'name' => 'Fajutas de res',
            'ingredients' => 'Manzo, peperoni, cipolle, piccante',
            'description' => 'Deliziose striscioline di carne di manzo saltate in padella con un mix homemade di
            spezie, peperoni e cipolle. Servite con tortillas, guacamole, salsa rossa piccante, riso e sour cream.',
            'price' => 620,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'fajutas-de-res.jpg',
            'restaurant_id' => 13,
        ],
        [
            //'id' => 47,
            //'categories' => Messicano
            'name' => 'Chilli con carne',
            'ingredients' => 'Manzo, fagioli, formaggio',
            'description' => 'Carne di manzo, pomodoro, fagioli e jalapeños. Servita con tortillas, sour cream,
            formaggio Cheddar a scaglie e nachos.',
            'price' => 720,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'chilly-con-carne.jpg',
            'restaurant_id' => 13,
        ],
        [
            //'id' => 48,
            //'categories' => Messicano
            'name' => 'Taco de pollo',
            'ingredients' => 'Pollo, pomodoro, formaggio, riso',
            'description' => 'Due tortillas di farina ripiene di pollo in salsa di pomodoro speziata e formaggio.
            Servite con riso mex, sour cream e guacamole.',
            'price' => 640,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'taco-de-pollo.jpg',
            'restaurant_id' => 13,
        ],
        [
            //'id' => 49,
            //'categories' => Messicano
            'name' => 'Vegeterian burrito',
            'ingredients' => 'Verdre miste, fagioli, formaggio',
            'description' => 'Tortilla di farina gigante ripiena di formaggio, zucchine, melanzane, peperoni,
            fagioli, mais e salsa di pomodoro. Servita con fagioli e guacamole.',
            'price' => 620,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'vegetarian-burrito.jpg',
            'restaurant_id' => 19,
        ],
        [
            //'id' => 50,
            //'categories' => Messicano
            'name' => 'Salmon wrap',
            'ingredients' => 'Salmone, insalata, pomodori, feta',
            'description' => 'Tortilla farcita con salmone affumicato, riso basmati, guacamole, insalata,
            pomodorini, feta greca e onion crispy flakes, accompagnata da patatine fritte e salse West Coast.',
            'price' => 720,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'salmon-wrap.jpg',
            'restaurant_id' => 19,
        ],
        [
            //'id' => 51,
            //'categories' => Messicano
            'name' => 'Vegeterian burrito',
            'ingredients' => 'Verdre miste, fagioli, formaggio',
            'description' => 'Tortilla di farina gigante ripiena di formaggio, zucchine, melanzane, peperoni,
            fagioli, mais e salsa di pomodoro. Servita con fagioli e guacamole.',
            'price' => 720,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'vegetarian-burrito.jpg',
            'restaurant_id' => 19,
        ],
        [
            //'id' => 52,
            //'categories' => Messicano
            'name' => 'Fruit Salad',
            'ingredients' => 'Insalata, frutta',
            'description' => 'Sfiziosa insalata con rucola, finocchio e frutta di stagione.',
            'price' => 440,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'fruit-salad.jpg',
            'restaurant_id' => 19,
        ],
        [
            //'id' => 53,
            //'categories' => Messicano
            'name' => 'Cesar Salad',
            'ingredients' => 'Insalata, parmigiano, salsa',
            'description' => 'Insalata romana, pomodoro, pane tostato, scaglie di parmigiano, accompagnata da salsa
            Caesar.',
            'price' => 520,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'cesar-salad.jpg',
            'restaurant_id' => 19,
        ],

        //BAKERY
        [
            //'id' => 54,
            //'categories' => Bakery
            'name' => 'Cinnamon Roll',
            'ingredients' => 'Burro, vaniglia (bacca), uova, LATTE, zucchero, uova, cannella',
            'description' => 'Cinnamon roll freschi di giornata impacchettati caldi',
            'price' => 300,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'bak (8).jpg',
            'restaurant_id' => 9,
        ],
        [
            //'id' => 55,
            //'categories' => Bakery
            'name' => 'Donut al cioccolato',
            'ingredients' => 'Burro, vaniglia (bacca), uova, LATTE, zucchero, uova, cioccolato',
            'description' => 'I donuts (o doughnuts) sono molto simili alle ciambelle italiane, ma invece di essere cosparsi di zucchero bianco, sono ricoperti di glassa di svariati colori e sapori.',
            'price' => 150,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'bak (19).jpg',
            'restaurant_id' => 9,
        ],
        [
            //'id' => 56,
            //'categories' => Bakery
            'name' => 'American Cookies',
            'ingredients' => 'Burro, vaniglia (bacca), cacao amaro, uova, LATTE, zucchero, uova, gocce di cioccolato',
            'description' => 'Cookies classici, nella variante chocolate chip o al cacao',
            'price' => 100,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'bak (16).jpg',
            'restaurant_id' => 9,
        ],
        [
            //'id' => 57,
            //'categories' => Bakery
            'name' => 'Cupcakes caramello salato',
            'ingredients' => 'Burro, vaniglia (bacca), cacao, uova, caramello salato, LATTE, zucchero, frosting, panna',
            'description' => 'Cupcake base cacao con cuore di caramello salato, panna e topping di caramello salato croccante.',
            'price' => 300,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'bak (21).jpg',
            'restaurant_id' => 11,
        ],
        [
            //'id' => 58,
            //'categories' => Bakery
            'name' => 'Lemon meringue tart',
            'ingredients' => 'Lemon curd, limoni di Sorrento, uova, LATTE, maringa italiana',
            'description' => 'Tortina con base frolla e zucchero moscovado, lemon curd e meringa flambata',
            'price' => 400,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'bak (25).jpg',
            'restaurant_id' => 11,
        ],
        [
            //'id' => 59,
            //'categories' => Bakery
            'name' => 'New York Cheesecake',
            'ingredients' => 'Latte, formaggio, cioccolato, frutta',
            'description' => 'Da New York, la tradizionale torta americana al gusto di Philadelphia. Provala con i
            nostri topping homemade al gusto di fragola, frutti di bosco, cioccolato o Nutella.',
            'price' => 450,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'nwe-york-cheesecake.jpg',
            'restaurant_id' => 15,
        ],
        [
            //'id' => 60,
            //'categories' => Bakery
            'name' => 'Deep chocolate cake',
            'ingredients' => 'Latte, cioccolato, uova',
            'description' => 'Una torta con tre strati di delizioso cioccolato, servita tiepida e accompagnata da
            panna montata.',
            'price' => 400,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'deep-chocolate-cake.jpg',
            'restaurant_id' => 15,
        ],
        [
            //'id' => 61,
            //'categories' => Bakery
            'name' => 'Torta Oreo',
            'ingredients' => 'Latte, cioccolato, uova',
            'description' => 'Morbido cioccolato bianco e nero si fondono con i famosi biscotti Oreo. Servita con
            panna montata.',
            'price' => 470,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'torta-oreo.jpg',
            'restaurant_id' => 15,
        ],
        [
            //'id' => 62,
            //'categories' => Bakery
            'name' => 'Toffee apple crumble',
            'ingredients' => 'Latte, mela, gelato vaniglia',
            'description' => 'Tipico crumble di mele alla cannella racchiuso in un basket di pastafrolla con cuore di caramello, servito con gelato alla vaniglia.',
            'price' => 400,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'apple-crumble.jpg',
            'restaurant_id' => 15,
        ],
        [
            //'id' => 63,
            //'categories' => Bakery
            'name' => 'Vegan apple pie',
            'ingredients' => 'Latte, uova, mela, cannella',
            'description' => 'Una ricca variante vegana della classica Apple Pie. Crostata di pasta frolla con
            ripieno di mele al profumo di cannella e mandorle tostate.',
            'price' => 380,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'vegan-apple-pie.jpg',
            'restaurant_id' => 15,
        ],
        [
            //'id' => 64,
            //'categories' => Bakery
            'name' => 'Sandy Yogurt',
            'ingredients' => 'Latte, frutta',
            'description' => 'Cremoso yogurt gelato guarnito con frutta fresca, cereali e marmellata homemade di
            frutti di bosco.',
            'price' => 350,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'sandy-yogurt.jpg',
            'restaurant_id' => 21,
        ],
        [
            //'id' => 65,
            //'categories' => Bakery
            'name' => 'Danny Yogurt',
            'ingredients' => 'Latte, uova, mela, cannella',
            'description' => 'Cremoso yogurt gelato guarnito con Nutella e granella di nocciole. Lasciati trasportare da questi fantastici sapori.',
            'price' => 350,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'danny-yogurt.jpg',
            'restaurant_id' => 21,
        ],

        //POKE
        [
            //'id' => 68,
            //'categories' => Poke
            'name' => 'Hawaii',
            'ingredients' => 'Mango, salmone, riso bianco, avocado, cetriolo, sesamo, lime, salsa yogurt',
            'description' => "Voglia di vacanza? con il nostro poke Hawaii ti trasportiamo dall'altra parte del mondo.",
            'price' => 1400,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pok (7).jpg',
            'restaurant_id' => 2,
        ],
        [
            //'id' => 69,
            //'categories' => Poke
            'name' => 'Spicy salmon',
            'ingredients' => 'Salmone marinato in salsa teryiaki, riso rosso, avocado, cetriolo, sesamo, lime, salsa teryiaki, soia',
            'description' => 'Prova il gusto del nostro salmone marinato 48 ore in salsa teryiaki, non potrai più farne a meno.',
            'price' => 900,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pok (10).jpg',
            'restaurant_id' => 2,
        ],
        [
            //'id' => 70,
            //'categories' => Poke
            'name' => 'Tasty Calamaro',
            'ingredients' => 'Calamaro alla piastra, salmone, riso bianco, avocado, cetriolo, sesamo, lime, salsa yogurt',
            'description' => 'Il più buon calamaro alla piastra arricchito con dei sapori unici.',
            'price' => 1200,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pok (12).jpg', //'/path/img',
            'restaurant_id' => 6,
        ],
        [
            //'id' => 71,
            //'categories' => Poke
            'name' => 'Crunchy salad',
            'ingredients' => 'Tempeh alla griglia, parmigiano, avocado, soia, cuore di lattuga, salsa teryiaki',
            'description' => 'Hai mia provato il Tempeh? se la risposta è no questa è la tua occasione. Adatto per i vegetariani.',
            'price' => 1200,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pok (13).jpg',
            'restaurant_id' => 6,
        ],
        [
            //'id' => 72,
            //'categories' => Poke
            'name' => 'Yellow explosion',
            'ingredients' => 'Salmone, pomodoro, mais tostato, carote, semi di papavero, raddichio, sedano, salsa al sesamo',
            'description' => 'Salmone selvaggio Norvegese con il croccante del mais toststo, provare per credere.',
            'price' => 1500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pok (15).jpg',
            'restaurant_id' => 6,
        ],
        [
            //'id' => 73,
            //'categories' => Poke
            'name' => 'Fruit Tornado',
            'ingredients' => 'Avocado, susine, fragole, ribes rosso, melagrana, mirtilli, lamponi, more, rucola, ribes nero, riduzione di mirtillo selvatico',
            'description' => 'Un mix di frutti esotici che difficilemte dimenticherai.',
            'price' => 1200,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pok (16).jpg',
            'restaurant_id' => 18,
        ],
        [
            //'id' => 74,
            //'categories' => Poke
            'name' => 'Poke Aloha',
            'ingredients' => 'Salmone, verdure, semi',
            'description' => 'Tartare di salmone piccante, surimi, edamame, cipolla fritta e semi di sesamo. Provalo e dicci cosa ne pensi.',
            'price' => 1250,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'poke-aloha.jpg',
            'restaurant_id' => 18,
        ],

        // PESCE
        [
            //'id' => 79,
            //'categories' => Pesce
            'name' => 'Branzino alla griglia',
            'ingredients' => 'Branzino, erbe aromatiche, aglio, limone, lime',
            'description' => 'Branzino pescato in giornata alla griglia con erbe aromatiche e agrumi',
            'price' => 1000,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pesc (3).jpg',
            'restaurant_id' => 5,
        ],
        [
            //'id' => 80,
            //'categories' => Pesce
            'name' => 'Salmone alla griglia',
            'ingredients' => 'Salmone, erbe aromatiche, aglio, limone, lime',
            'description' => 'Salmone pescato in giornata alla griglia con erbe aromatiche e agrumi',
            'price' => 1000,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pesc (2).jpg',
            'restaurant_id' => 5,
        ],
        [
            //'id' => 81,
            //'categories' => Pesce
            'name' => "Spaghetti all'astice",
            'ingredients' => 'Uova, farina 00, acqua, astice, prezzemolo ',
            'description' => 'Spaghetti alla chitarra fatti in casa con astice fresco del mediterraneo',
            'price' => 1000,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pesc (14).jpg',
            'restaurant_id' => 6,
        ],
        [
            //'id' => 82,
            //'categories' => Pesce
            'name' => 'Carpaccio di branzino',
            'ingredients' => 'Branzino, capperi, olive taggiasche, limone ',
            'description' => 'Branzinpo crudo con salsa di limone, capperi e polvere di olive taggiasche',
            'price' => 1000,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pesc (18).jpg',
            'restaurant_id' => 6,
        ],
        [
            //'id' => 83,
            //'categories' => Pesce
            'name' => 'Mazzancolle Flambate',
            'ingredients' => 'Mazzancolle, vin santo, mandarino, prezzemolo, aglio',
            'description' => 'Mazzancolle marinate e flambate vin santo e succo di mandarino e servite con riduzione di mandarino',
            'price' => 1000,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'pesc (21).jpg',
            'restaurant_id' => 7,
        ],
        [
            //'id' => 84,
            //'categories' => Pesce
            'name' => 'Zuppa di pesce misto',
            'ingredients' => 'Totani medi puliti, seppioline pulite, scampi, bicchiere di vino bianco, pomodori pelati scolati',
            'description' => "Una ricetta di mare​ molto gustosa con il pesce fresco da accompagnare con del pane. Per un pranzo o una cena d'estate.",
            'price' => 1000,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'zuppa-mare.jpg',
            'restaurant_id' => 7,
        ],

        // CARNE
        [
            //'id' => 85,
            //'categories' => Carne
            'name' => 'Tagliata di manzo',
            'ingredients' => 'Manzo, sale grosso',
            'description' => 'Tagliata di Chianina con sale grosso e riduzione dei sughi della carne e di vino rosso',
            'price' => 2500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'car (1).jpg',
            'restaurant_id' => 1,
        ],
        [
            //'id' => 86,
            //'categories' => Carne
            'name' => 'Tomawk',
            'ingredients' => 'Black Angus, aromi, sale',
            'description' => 'Tomawk di Black Angus Australiano certificato cotto alla brace',
            'price' => 3000,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'car (3).jpg',
            'restaurant_id' => 1,
        ],
        [
            //'id' => 87,
            //'categories' => Carne
            'name' => 'Tartare di manzo',
            'ingredients' => 'Manzo, uovo, polvere di capperi, sale grosso, cetriolini, pepe nero',
            'description' => 'Tartare di manzo servita con uovo e accompagnata da 4 condimenti separati',
            'price' => 1000,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'car (5).jpg',
            'restaurant_id' => 4,
        ],
        [
            //'id' => 88,
            //'categories' => Carne
            'name' => 'Ribs affumicate',
            'ingredients' => 'Costolette di manzo, salsa barbecue, aromi',
            'description' => 'Ribs di Black Angus Australiano servite con crosta di salsa barbecue e affumicate per 12ore con precottura a bassa temperatura',
            'price' => 1500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'car (7).jpg',
            'restaurant_id' => 4,
        ],
        [
            //'id' => 89,
            //'categories' => Carne
            'name' => 'Bacon bombs',
            'ingredients' => 'Salsiccia di maiale, bacon, formaggio',
            'description' => 'Salsicce arrotolate con bacon affumicato di nostra produzione e cuore di formaggio',
            'price' => 600,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'car (10).jpg',
            'restaurant_id' => 7,
        ],
        [
            //'id' => 90,
            //'categories' => Carne
            'name' => 'Spezzatino di manzo',
            'ingredients' => 'Carne bovina, Sedano, Pepe nero, Burro, Rosmarino, Brodo di carne',
            'description' => "Ma tra i secondi piatti non c’è storia, lo spezzatino di manzo è quello che vince su tutti! La sua lenta cottura, i pochi ed essenziali profumi necessari affinché diventi così buono, ne fanno una ricetta che nessuno riesce a non amare.",
            'price' => 700,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'spezzatino-di-manzo.jpg',
            'restaurant_id' => 7,
        ],
        [
            //'id' => 91,
            //'categories' => Carne
            'name' => 'Costine glassate',
            'ingredients' => 'Costine di maiale, Peperoncino, Cumino, Paprika dolce, Senape gialla in polvere',
            'description' => "Per realizzare le costine glassate con salsa bbq si ha bisogno di una prelibata miscela di spezie in polvere, conosciuta come dry rub, che andrà a insaporire la carne dopo un bel massaggio.",
            'price' => 1500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'costine glassate.jpg',
            'restaurant_id' => 7,
        ],
        [
            //'id' => 92,
            //'categories' => Carne
            'name' => 'Coniglio alla Ligure',
            'ingredients' => 'Coniglio, Timo, Rossese di Dolceacqua, Brodo di carne, Olive taggiasche, Pinoli, Rosmarino',
            'description' => "Questo piatto prelibato, altro non è se non l’accostamento tra la carne delicata e “dolce” del coniglio, ed il sapore invece abbastanza amarognolo dato dalle olive nere taggiasche, il vino locale, ed ovviamente le immancabili noci e pinoli.",
            'price' => 900,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'coniglio-alla-ligure.jpg',
            'restaurant_id' => 8,
        ],
        [
            //'id' => 93,
            //'categories' => Carne
            'name' => 'Bombette pugliesi',
            'ingredients' => 'Fettine di vitello, Caciocavallo, Pancetta, Prezzemolo, Pepe nero',
            'description' => "Le bombette pugliesi sono un secondo piatto di carne tipico della cucina pugliese e consistono in involtini di vitello  ripieni o in alcuni casi avvolti da pancetta, con un cuore saporito di caciocavallo.",
            'price' => 1200,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'bombette pugliesi.jpg',
            'restaurant_id' => 8,
        ],
        [
            //'id' => 94,
            //'categories' => Carne
            'name' => 'Filetto di maiale',
            'ingredients' => 'Filetto di maiale, Burro, Vino rosso, Scorza di limone, Scalogno',
            'description' => "Un secondo piatto raffinato, saporito e dalle note aromatiche, accompagnato da bocconcini di mela che conferiranno una gradevole nota agrodolce alla pietanza.",
            'price' => 700,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'filetto-di-maiale.jpg',
            'restaurant_id' => 8,
        ],
        [
            //'id' => 95,
            //'categories' => Carne
            'name' => 'Maiale in agrodolce',
            'ingredients' => 'Maiale, Cipolle, Carote, Farina, Passata di pomodoro, Aceto di vino bianco, Zucchero di canna',
            'description' => "I bocconcini di carne di maiale vengono prima coperti di pastella e fritti, poi arricchiti con verdure saltate al wok e cosparsi di una gustosissima salsina agrodolce.",
            'price' => 1100,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'maiale-in-agrodolce.jpg',
            'restaurant_id' => 11,
        ],
        [
            //'id' => 96,
            //'categories' => Carne
            'name' => "Petto d'anatra",
            'ingredients' => "Petto d'anatra, Timo, Miele, Insalata misticanza, Cipolle dorate, Aceto balsamico",
            'description' => "Le carni pregiate dell'anatra sono classificate tra le carni nere e si distinguono per la loro morbidezza ed il colore rosato che assumono una volta cotte.",
            'price' => 1700,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'petto-di-anatra.jpg',
            'restaurant_id' => 11,
        ],
        [
            //'id' => 97,
            //'categories' => Carne
            'name' => 'Bistecca alla Tartara',
            'ingredients' => 'Filetto di vitello, Capperi, Succo di limone, Pepe nero, Worcestershire sauce, Prezzemolo, Tuorli',
            'description' => "La Bistecca alla tartara (o steak tartare) è un piatto classico della cucina internazionale, consiste in una preparazione a base di carne cruda fresca e macinata finemente che viene condita con olio, limone, salsa Worcershire e senape e accompagnata con un tuorlo d’uovo crudo.",
            'price' => 1300,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'bistecca-alla-tartara.jpg',
            'restaurant_id' => 11,
        ],

        // CINESE
        [
            //'id' => 98,
            //'categories' => Cinese
            'name' => 'Bao',
            'ingredients' => 'Gamberetti, cipolla, soia',
            'description' => 'Soffici panini ripieni di gamberi cotti al vappore',
            'price' => 300,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'cin (6).jpg',
            'restaurant_id' => 4,
        ],
        [
            //'id' => 99,
            //'categories' => Cinese
            'name' => 'Gyoza alla griglia',
            'ingredients' => 'Manzo, cipolla, erba cipollina, soia',
            'description' => 'Ravioli al manzo cotti alla piastra',
            'price' => 500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'cin (8).jpg',
            'restaurant_id' => 4,
        ],
        [
            //'id' => 100,
            //'categories' => Cinese
            'name' => 'Gyoza al vapore',
            'ingredients' => 'Gamberi, cozze, cipolla, erba cipollina, soia',
            'description' => 'Ravioli ai gamberetti cotti al vapore',
            'price' => 500,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'cin (10).jpg',
            'restaurant_id' => 4,
        ],
        [
            //'id' => 101,
            //'categories' => Cinese
            'name' => 'Zuppa di Miso',
            'ingredients' => 'Acqua, carote, daikon, porri, zenzero, miso, alga wakame, tofu',
            'description' => "La misoshiru, zuppa di miso in giapponese, e' costituita da un brodo, aromatizzato con alga wakame e il miso",
            'price' => 300,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'sush (24).jpg',
            'restaurant_id' => 12,
        ],
        [
            //'id' => 102,
            //'categories' => Cinese
            'name' => 'Involtini primavera',
            'ingredients' => 'Cipolla ,cavolo, sfoglia, vino, arachidi',
            'description' => "In passato venivano preparati soprattutto in occasione del Capodanno cinese, che secondo il calendario tradizionale corrisponde con la data d'inizio della primavera. Ed ecco spiegato il loro nome: involtini primavera!",
            'price' => 300,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'cin (3).jpg',
            'restaurant_id' => 12,
        ],
        [
            //'id' => 103,
            //'categories' => Cinese
            'name' => 'Spaghetti saltati',
            'ingredients' => 'Frutti di mare, spaghetti, cipolla, noodles di grano',
            'description' => 'Noodles di grano fatti a mano dalla nostra figlia Mulan e con i frutti dalla pesca dello zio Mushu',
            'price' => 600,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'cin (5).jpg',
            'restaurant_id' => 12,
        ],

        // VEGAN
        [
            //'id' => 105,
            //'categories' => Vegan
            'name' => 'Spaghetti di zucchine',
            'ingredients' => 'Zucchine, olive verdi, pomodoro, basilico',
            'description' => 'Semplici e gustosi, la zucchina in una forma simpatica e appetitosa, accompagnata da pomodorini datterini, olive verdi e basilico fresco',
            'price' => 700,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'veg (2).jpg',
            'restaurant_id' => 17,
        ],
        [
            //'id' => 106,
            //'categories' => Vegan
            'name' => 'Hummus di ceci',
            'ingredients' => 'Ceci, olio di oliva, aglio, salsa tahina, limone, paprika',
            'description' => 'Salsa di ceci speziata, perfetta da accompagniare con un pinzimonio fresco',
            'price' => 400,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'veg (8).jpg',
            'restaurant_id' => 17,
        ],
        [
            //'id' => 107,
            //'categories' => Vegan
            'name' => 'Polpette vegetali',
            'ingredients' => 'Ceci, pomodori secchi, aglio, melanzane, sesamo',
            'description' => 'Polpette 100% di origine vegetale, con ceci, melanzane e pomodori secchi',
            'price' => 400,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'veg (7).jpg',
            'restaurant_id' => 17,
        ],
        [
            //'id' => 108,
            //'categories' => Vegan
            'name' => 'Dahl di lenticchie',
            'ingredients' => 'Lenticchie, curry, coriandolo, zenzero',
            'description' => "Piatto indiano molto speziato, perfetto per le giornate invernali grazie alle proprieta' riscaldanti dello zenzero ma adatto anche per tutti i mesi dell anno.",
            'price' => 400,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'veg (1).jpg',
            'restaurant_id' => 17,
        ],
        [
            //'id' => 109,
            //'categories' => Vegan
            'name' => 'Cheesecake vegana fredda',
            'ingredients' => 'Biscotti, margarina, formaggio vegetale, limone, panna vegetale, fragole',
            'description' => 'Un classico americano rivisto in chiave vegana senza compromessi di gusto!',
            'price' => 400,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'veg (3).jpg',
            'restaurant_id' => 17,
        ],
        [
            //'id' => 110,
            //'categories' => Vegano
            'name' => 'Parmigiana di melanzane',
            'ingredients' => 'Melanzane ovali nere, Fiordilatte, Passata di pomodoro, Basilico, Olio di semi di arachide, Cipolle dorate',
            'description' => "Vi siete mai chiesti perché si chiami così? Il nome 'Parmigiana' deriverebbe proprio dal siciliano 'Parmiciana', che in dialetto indica la pila di listelle di legno delle persiane: pensate infatti a come vengono disposte le fette di melanzane in teglia e noterete le similitudini.",
            'price' => 1300,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'parmigiana-di-melanzane.jpg',
            'restaurant_id' => 21,
        ],
        [
            //'id' => 111,
            //'categories' => Vegano
            'name' => 'Polpette di spinaci',
            'ingredients' => 'Spinaci, Ricotta vaccina, Grana Padano DOP, Uova, Pangrattato, ',
            'description' => "Uno degli abbinamenti più riusciti in cucina, spinaci e ricotta, rinnova le promesse e ci invita a provare questi squisiti bocconcini fritti. ",
            'price' => 600,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'polpette-di-spinaci.jpg',
            'restaurant_id' => 21,
        ],
        [
            //'id' => 112,
            //'categories' => Vegano
            'name' => 'Frittelle di patate',
            'ingredients' => 'Patate, Rosmarino, Farina, Sale, Pepe nero, Olio di oliva',
            'description' => "Le frittelle croccanti di patate sono dei deliziosi bocconcini fritti da mangiare come antipasto o come secondo e che vi faranno riscuotere un grande successo.",
            'price' => 1300,
            'visible'  => 1,
            'deleted' => 0,
            'img' => 'frittelle-di-patate.jpg',
            'restaurant_id' => 21,
        ],
    ];
        
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
