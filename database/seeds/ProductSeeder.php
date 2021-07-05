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
                'restaurant_id' => 1,
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
                'restaurant_id' => 1,
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
                'restaurant_id' => 1,
            ],
            [
                //'id' => 4,
                //'categories' => Fast-Food
                'name' => 'Hot Dog',
                'ingredients' => 'Pane, wurstel (maiale), ketchup, maionese',
                'description' => 'Bun burger a lievitazione naturale, wurstel di maiale 100% italiano, ketchup, maionese',
                'price' => 500,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'fast (3).jpg',
                'restaurant_id' => 2,
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
                'restaurant_id' => 2,
            ],

            //PIZZERIE
            [
                //'id' => 6,
                //'categories' => Pizzeria
                'name' => 'Margherita',
                'ingredients' => 'Pomodoro, mozzarella, basilico',
                'description' => 'Pizza con impasto lievitato almeno 24 ore, cotta a legna, tutti gli ingredienti sono di nostra produzione.',
                'price' => 500,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'piz (22).jpg',
                'restaurant_id' => 2,
            ],
            [
                //'id' => 7,
                //'categories' => Pizzeria
                'name' => 'Diavola',
                'ingredients' => 'Pomodoro, mozzarella, salamino piccante, polvere di habanero',
                'description' => 'Pizza con impasto lievitato almeno 24 ore, cotta a legna, tutti gli ingredienti sono di nostra produzione.',
                'price' => 700,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'piz (1).jpg',
                'restaurant_id' => 3,
            ],
            [
                //'id' => 8,
                //'categories' => Pizzeria
                'name' => 'Chicago style',
                'ingredients' => 'Pomodoro, mozzarella, parmigiano,',
                'description' => 'Pizza con doppio impasto lievitato almeno 24 ore, cotta in padella di ghisa a bassa temperatura, tutti gli ingredienti sono di nostra produzione.',
                'price' => 900,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'piz (10).jpg',
                'restaurant_id' => 3,
            ],    
            [
                //'id' => 9,
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
                //'id' => 10,
                //'categories' => Pizzeria
                'name' => 'Calzone farcito',
                'ingredients' => 'Pomodoro, mozzarella, parmigiano, funghi, prosciutto arrosto, scamorza affumicata',
                'description' => 'Calzone con impasto lievitato almeno 24 ore, cotta in padella di ghisa a bassa temperatura, tutti gli ingredienti sono di nostra produzione.',
                'price' => 800,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'piz (27).jpg',
                'restaurant_id' => 4,
            ],

            // SUSHI
            [
                //'id' => 11,
                //'categories' => Sushi
                'name' => 'Sushi mix',
                'ingredients' => 'Osomaki salmone-tonno-cetriolo, futomaki, nigiri tonno-salmone, spicy roll',
                'description' => 'Sushi misto 24pz',
                'price' => 1500,
                'visible'  => 1,
                'deleted' => 0,
                'img' =>'sush (1).jpg',
                'restaurant_id' => 4,
            ],
            [
                //'id' => 12,
                //'categories' => Sushi
                'name' => 'Carolina Roll',
                'ingredients' => 'Salmone, riso, philadelphia, alga nori',
                'description' => 'Roll 10pz',
                'price' => 600,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'sush (4).jpg',
                'restaurant_id' => 4, 
            ],  
            [
                //'id' => 13,
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
                //'id' => 14,
                //'categories' => Sushi
                'name' => 'Futomaki',
                'ingredients' => 'Salmone, riso, alga nori, panatura (farina di riso, pane, mais)',
                'description' => 'Roll fritto 8pz',
                'price' => 500,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'sush (13).jpg',
                'restaurant_id' => 5, 
            ],
            [
                //'id' => 15,
                //'categories' => Sushi
                'name' => 'Ramen',
                'ingredients' => 'Manzo, noodles, uova, naruto, cipollotto, brodo, germogli di soia',
                'description' => 'Ramen tradizionale giapponese (Okinawa)',
                'price' => 1000,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'sush (18).jpg',
                'restaurant_id' => 5, 
            ],

            // MESSICANO
            [
                //'id' => 16,
                //'categories' => Messiacano
                'name' => 'Tortillas',
                'ingredients' => 'Manzo sfilacciato, avocado, cipolla bianca, salsa al mango',
                'description' => 'Tortillas fatte in casa con cottura alla piastra',
                'price' => 450,
                'visible'  => 1,
                'deleted' => 0,
                'img' => NULL, //'/path/img',
                'restaurant_id' => 6, 
            ],
            [
                //'id' => 17,
                //'categories' => Messiacano
                'name' => 'Nachos Vamos',
                'ingredients' => 'Nachos, jalapenoa fette, salsa burger, chilly con carne',
                'description' => 'Crunchy nachos cottura al forno, con chilly di carne a lenta cottura ',
                'price' => 350,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'mex (16).jpg',
                'restaurant_id' => 6, 
            ],
            [
                //'id' => 18,
                //'categories' => Messiacano
                'name' => 'Mexican fit meal',
                'ingredients' => 'Polpette, riso, piselli, avocado, brodo, jalapeno',
                'description' => 'Gustoso piatto completo a basso contenuno di grassi, elevato contenuto proteico e tanto gusto',
                'price' => 700,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'mex (11).jpg',
                'restaurant_id' => 6, 
            ],
            [
                //'id' => 19,
                //'categories' => Messiacano
                'name' => 'Summer burrito',
                'ingredients' => 'Pollo, riso, piadina, cipolla stufata, fagioli neri, peperoni rossi e gialli, lime',
                'description' => 'Burrito fresco e facile da mangiare, diviso in 4 porzioni, idele per estate',
                'price' => 700,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'mex (3).jpg',
                'restaurant_id' => 7, 
            ],
            [
                //'id' => 20,
                //'categories' => Messiacano
                'name' => 'Churros',
                'ingredients' => 'Churros, nutella o duche de leche o miele',
                'description' => 'Churros fritti al momento con zucchero e guarnizione a scelta',
                'price' => 400,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'mex (21).jpg',
                'restaurant_id' => 7, 
            ],

            //BAKERY
            [
                //'id' => 21,
                //'categories' => Bakery
                'name' => 'Cinnamon Roll',
                'ingredients' => 'Burro, vaniglia (bacca), uova, LATTE, zucchero, uova, cannella',
                'description' => 'Cinnamon roll freschi di giornata impacchettati caldi',
                'price' => 300,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'bak (8).jpg',
                'restaurant_id' => 7, 
            ],
            [
                //'id' => 22,
                //'categories' => Bakery
                'name' => 'Donut al cioccolato',
                'ingredients' => 'Burro, vaniglia (bacca), uova, LATTE, zucchero, uova, cioccolato',
                'description' => 'I donuts (o doughnuts) sono molto simili alle ciambelle italiane, ma invece di essere cosparsi di zucchero bianco, sono ricoperti di glassa di svariati colori e sapori.',
                'price' => 150,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'bak (19).jpg',
                'restaurant_id' => 8, 
            ],
            [
                //'id' => 23,
                //'categories' => Bakery
                'name' => 'American Cookies',
                'ingredients' => 'Burro, vaniglia (bacca), cacao amaro, uova, LATTE, zucchero, uova, gocce di cioccolato',
                'description' => 'Cookies classici, nella variante chocolate chip o al cacao',
                'price' => 100,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'bak (16).jpg',
                'restaurant_id' => 8, 
            ],
            [
                //'id' => 24,
                //'categories' => Bakery
                'name' => 'Cupcakes caramello salato',
                'ingredients' => 'Burro, vaniglia (bacca), cacao, uova, caramello salato, LATTE, zucchero, frosting, panna',
                'description' => 'Cupcake base cacao con cuore di caramello salato, panna e topping di caramello salato croccante.',
                'price' => 300,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'bak (21).jpg',
                'restaurant_id' => 8, 
            ],
            [
                //'id' => 25,
                //'categories' => Bakery
                'name' => 'Lemon meringue tart',
                'ingredients' => 'Lemon curd, limoni di Sorrento, uova, LATTE, maringa italiana',
                'description' => 'Tortina con base frolla e zucchero moscovado, lemon curd e meringa flambata',
                'price' => 400,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'bak (25).jpg',
                'restaurant_id' => 9, 
            ],

            //POKE
            [
                //'id' => 26,
                //'categories' => Poke
                'name' => 'Hawaii',
                'ingredients' => 'Mango, salmone, riso bianco, avocado, cetriolo, sesamo, lime, salsa yogurt',
                'description' => 'Taglia regular',
                'price' => 1400,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pok (7).jpg',
                'restaurant_id' => 9,
            ],
            [
                //'id' => 27,
                //'categories' => Poke
                'name' => 'Spicy salmon',
                'ingredients' => 'Salmone marinato in salsa teryiaki, riso rosso, avocado, cetriolo, sesamo, lime, salsa teryiaki, soia',
                'description' => 'Taglia small',
                'price' => 900,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pok (10).jpg',
                'restaurant_id' => 9,
            ],
            [
                //'id' => 28,
                //'categories' => Poke
                'name' => 'Tasty Calamaro',
                'ingredients' => 'Calamaro alla piastra, salmone, riso bianco, avocado, cetriolo, sesamo, lime, salsa yogurt',
                'description' => 'Taglia regular',
                'price' => 1200,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pok (12).jpg', //'/path/img',
                'restaurant_id' => 10,
            ],
            [
                //'id' => 28,
                //'categories' => Poke
                'name' => 'Crunchy salad',
                'ingredients' => 'Tempeh alla griglia, parmigiano, avocado, soia, cuore di lattuga, salsa teryiaki',
                'description' => 'Taglia regular',
                'price' => 1200,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pok (13).jpg',
                'restaurant_id' => 10,
            ],
            [
                //'id' => 29,
                //'categories' => Poke
                'name' => 'Yellow explosion',
                'ingredients' => 'Salmone, pomodoro, mais tostato, carote, semi di papavero, raddichio, sedano, salsa al sesamo',
                'description' => 'Taglia large',
                'price' => 1500,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pok (15).jpg',
                'restaurant_id' => 10,
            ],
            [
                //'id' => 30,
                //'categories' => Poke
                'name' => 'Fruit Tornado',
                'ingredients' => 'Avocado, susine, fragole, ribes rosso, melagrana, mirtilli, lamponi, more, rucola, ribes nero, riduzione di mirtillo selvatico',
                'description' => 'Taglia large',
                'price' => 1200,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pok (16).jpg',
                'restaurant_id' => 11,
            ],

            // PESCE
            [
                //'id' => 31,
                //'categories' => Pesce
                'name' => 'Branzino alla griglia',
                'ingredients' => 'Branzino, erbe aromatiche, aglio, limone, lime',
                'description' => 'Branzino pescato in giornata alla griglia con erbe aromatiche e agrumi',
                'price' => 1000,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pesc (3).jpg',
                'restaurant_id' => 11,
            ],
            [
                //'id' => 32,
                //'categories' => Pesce
                'name' => 'Salmone alla griglia',
                'ingredients' => 'Salmone, erbe aromatiche, aglio, limone, lime',
                'description' => 'Salmone pescato in giornata alla griglia con erbe aromatiche e agrumi',
                'price' => 1000,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pesc (2).jpg',
                'restaurant_id' => 12,
            ],
            [
                //'id' => 33,
                //'categories' => Pesce
                'name' => "Spaghetti all'astice",
                'ingredients' => 'Uova, farina 00, acqua, astice, prezzemolo ',
                'description' => 'Spaghetti alla chitarra fatti in casa con astice fresco del mediterraneo',
                'price' => 1000,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pesc (14).jpg',
                'restaurant_id' => 12,
            ],
            [
                //'id' => 34,
                //'categories' => Pesce
                'name' => 'Carpaccio di branzino',
                'ingredients' => 'Branzino, capperi, olive taggiasche, limone ',
                'description' => 'Branzinpo crudo con salsa di limone, capperi e polvere di olive taggiasche',
                'price' => 1000,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pesc (18).jpg',
                'restaurant_id' => 13,
            ],
            [
                //'id' => 35,
                //'categories' => Pesce
                'name' => 'Mazzancolle Flambate',
                'ingredients' => 'Mazzancolle, vin santo, mandarino, prezzemolo, aglio',
                'description' => 'Mazzancolle marinate e flambate vin santo e succo di mandarino e servite con riduzione di mandarino',
                'price' => 1000,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'pesc (21).jpg',
                'restaurant_id' => 13,
            ],

            // CARNE
            [
                //'id' => 36,
                //'categories' => Carne
                'name' => 'Tagliata di manzo',
                'ingredients' => 'Manzo, sale grosso',
                'description' => 'Tagliata di Chianina con sale grosso e riduzione dei sughi della carne e di vino rosso',
                'price' => 2500,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'car (1).jpg',
                'restaurant_id' => 14,
            ],
            [
                //'id' => 37,
                //'categories' => Carne
                'name' => 'Tomawk',
                'ingredients' => 'Black Angus, aromi, sale',
                'description' => 'Tomawk di Black Angus Australiano certificato cotto alla brace',
                'price' => 3000,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'car (3).jpg',
                'restaurant_id' => 14,
            ],
            [
                //'id' => 38,
                //'categories' => Carne
                'name' => 'Tartare di manzo',
                'ingredients' => 'Manzo, uovo, polvere di capperi, sale grosso, cetriolini, pepe nero',
                'description' => 'Tartare di manzo servita con uovo e accompagnata da 4 condimenti separati',
                'price' => 1000,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'car (5).jpg',
                'restaurant_id' => 15,
            ],
            [
                //'id' => 39,
                //'categories' => Carne
                'name' => 'Ribs affumicate',
                'ingredients' => 'Costolette di manzo, salsa barbecue, aromi',
                'description' => 'Ribs di Black Angus Australiano servite con crosta di salsa barbecue e affumicate per 12ore con precottura a bassa temperatura',
                'price' => 1500,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'car (7).jpg',
                'restaurant_id' => 15,
            ],
            [
                //'id' => 40,
                //'categories' => Carne
                'name' => 'Bacon bombs',
                'ingredients' => 'Salsiccia di maiale, bacon, formaggio',
                'description' => 'Salsicce arrotolate con bacon affumicato di nostra produzione e cuore di formaggio',
                'price' => 600,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'car (10).jpg',
                'restaurant_id' => 16,
            ],

            // CINESE
            [
                //'id' => 41,
                //'categories' => Cinese
                'name' => 'Bao',
                'ingredients' => 'Gamberetti, cipolla, soia',
                'description' => 'Soffici panini ripieni di gamberi cotti al vappore',
                'price' => 300,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'cin (6).jpg',
                'restaurant_id' => 16,
            ],
            [
                //'id' => 42,
                //'categories' => Cinese
                'name' => 'Gyoza alla griglia',
                'ingredients' => 'Manzo, cipolla, erba cipollina, soia',
                'description' => 'Ravioli al manzo cotti alla piastra',
                'price' => 500,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'cin (8).jpg',
                'restaurant_id' => 17,
            ],
            [
                //'id' => 43,
                //'categories' => Cinese
                'name' => 'Gyoza al vapore',
                'ingredients' => 'Gamberi, cozze, cipolla, erba cipollina, soia',
                'description' => 'Ravioli ai gamberetti cotti al vapore',
                'price' => 500,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'cin (10).jpg',
                'restaurant_id' => 17,
            ],
            [
                //'id' => 44,
                //'categories' => Cinese
                'name' => 'Zuppa di Miso',
                'ingredients' => 'Acqua, carote, daikon, porri, zenzero, miso, alga wakame, tofu',
                'description' => "La misoshiru, zuppa di miso in giapponese, e' costituita da un brodo, aromatizzato con alga wakame e il miso",
                'price' => 300,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'sush (24).jpg',
                'restaurant_id' => 18,
            ],
            [
                //'id' => 45,
                //'categories' => Cinese
                'name' => 'Involtini primavera',
                'ingredients' => 'Cipolla ,cavolo, sfoglia, vino, arachidi',
                'description' => "In passato venivano preparati soprattutto in occasione del Capodanno cinese, che secondo il calendario tradizionale corrisponde con la data d'inizio della primavera. Ed ecco spiegato il loro nome: involtini primavera!",
                'price' => 300,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'cin (3).jpg',
                'restaurant_id' => 18,
            ],
            [
                //'id' => 46,
                //'categories' => Cinese
                'name' => 'Spaghetti saltati',
                'ingredients' => 'Frutti di mare, spaghetti, cipolla, noodles di grano',
                'description' => 'Noodles di grano fatti a mano dalla nostra figlia Mulan e con i frutti dalla pesca dello zio Mushu',
                'price' => 600,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'cin (5).jpg',
                'restaurant_id' => 19,
            ],
            
            // VEGAN
            [
                //'id' => 47,
                //'categories' => Vegan
                'name' => 'Spaghetti di zucchine',
                'ingredients' => 'Zucchine, olive verdi, pomodoro, basilico',
                'description' => 'Semplici e gustosi, la zucchina in una forma simpatica e appetitosa, accompagnata da pomodorini datterini, olive verdi e basilico fresco',
                'price' => 700,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'veg (2).jpg',
                'restaurant_id' => 19,
            ],
            [
                //'id' => 48,
                //'categories' => Vegan
                'name' => 'Hummus di ceci',
                'ingredients' => 'Ceci, olio di oliva, aglio, salsa tahina, limone, paprika',
                'description' => 'Salsa di ceci speziata, perfetta da accompagniare con un pinzimonio fresco',
                'price' => 400,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'veg (8).jpg',
                'restaurant_id' => 20,
            ],
            [
                //'id' => 49,
                //'categories' => Vegan
                'name' => 'Polpette vegetali',
                'ingredients' => 'Ceci, pomodori secchi, aglio, melanzane, sesamo',
                'description' => 'Polpette 100% di origine vegetale, con ceci, melanzane e pomodori secchi',
                'price' => 400,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'veg (7).jpg',
                'restaurant_id' => 20,
            ],
            [
                //'id' => 50,
                //'categories' => Vegan
                'name' => 'Dahl di lenticchie',
                'ingredients' => 'Lenticchie, curry, coriandolo, zenzero',
                'description' => "Piatto indiano molto speziato, perfetto per le giornate invernali grazie alle proprieta' riscaldanti dello zenzero ma adatto anche per tutti i mesi dell anno.",
                'price' => 400,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'veg (1).jpg',
                'restaurant_id' => 21,
            ],
            [
                //'id' => 51,
                //'categories' => Vegan
                'name' => 'Cheesecake vegana fredda',
                'ingredients' => 'Biscotti, margarina, formaggio vegetale, limone, panna vegetale, fragole',
                'description' => 'Un classico americano rivisto in chiave vegana senza compromessi di gusto!',
                'price' => 400,
                'visible'  => 1,
                'deleted' => 0,
                'img' => 'veg (3).jpg',
                'restaurant_id' => 21,
            ],
        ];
        
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
