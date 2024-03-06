<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes =  [
            // mc
            [
                "restaurant_id" => 1,
                "name" => "Big Mac",
                "ingredients" => "Carne, formaggio, lattuga, cipolla, sottaceti, salsa speciale, pane con semi di sesamo",
                "price" => 4, 50,
                "img" => "img/big_mac.jpg",
            ],
            [
                "restaurant_id" => 1,
                "name" => "McChicken",
                "ingredients" => "Pollo impanato, maionese, lattuga, pane con semi di sesamo",
                "price" => 3, 50,
                "img" => "img/mcchicken.jpg",
            ],
            [
                "restaurant_id" => 1,
                "name" => "McNuggets",
                "ingredients" => "Pezzetti di pollo impanati, salsa a scelta",
                "price" => 2, 50,
                "img" => "img/mcnuggets.jpg",
            ],
            [
                "restaurant_id" => 1,
                "name" => "Patatine fritte",
                "ingredients" => "Patate, olio, sale",
                "price" => 2, 00,
                "img" => "img/patatine_fritte.jpg",
            ],
            [
                "restaurant_id" => 1,
                "name" => "Insalata Caesar",
                "ingredients" => "Lattuga, pollo, crostini, parmigiano, salsa Caesar",
                "price" => 3, 00,
                "img" => "img/insalata_caesar.jpg",
            ],
            [
                "restaurant_id" => 1,
                "name" => "Coca-Cola",
                "ingredients" => "Acqua, zucchero, anidride carbonica, colorante, aromi",
                "price" => 2, 00,
                "img" => "img/coca_cola.jpg",
            ],
            [
                "restaurant_id" => 1,
                "name" => "Fanta",
                "ingredients" => "Acqua, zucchero, anidride carbonica, succo di arancia, colorante, aromi",
                "price" => 2, 00,
                "img" => "img/fanta.jpg",
            ],
            [
                "restaurant_id" => 1,
                "name" => "Sprite",
                "ingredients" => "Acqua, zucchero, anidride carbonica, succo di limone, aromi",
                "price" => 2, 00,
                "img" => "img/sprite.jpg",
            ],
            [
                "restaurant_id" => 1,
                "name" => "Caffè",
                "ingredients" => "Acqua, caffè",
                "price" => 1, 00,
                "img" => "img/caffe.jpg",
            ],
            [
                "restaurant_id" => 1,
                "name" => "McFlurry",
                "ingredients" => "Gelato, topping a scelta",
                "price" => 2, 50,
                "img" => "img/mcflurry.jpg",
            ],
            //sushi
            [
                "restaurant_id" => 2,
                "name" => "Nigiri sushi",
                "ingredients" => "Riso, pesce crudo, wasabi",
                "price" => 3, 00,
                "img" => "img/nigiri_sushi.jpg",
            ],
            [
                "restaurant_id" => 2,
                "name" => "Maki sushi",
                "ingredients" => "Riso, alga nori, pesce crudo o verdure, salsa di soia",
                "price" => 2, 50,
                "img" => "img/maki_sushi.jpg",
            ],
            [
                "restaurant_id" => 2,
                "name" => "Sashimi",
                "ingredients" => "Pesce crudo tagliato a fette, wasabi, salsa di soia",
                "price" => 4, 00,
                "img" => "img/sashimi.jpg",
            ],
            [
                "restaurant_id" => 2,
                "name" => "Tempura",
                "ingredients" => "Gamberi o verdure fritte in pastella, salsa agrodolce",
                "price" => 3, 50,
                "img" => "img/tempura.jpg",
            ],
            [
                "restaurant_id" => 2,
                "name" => "Zuppa di miso",
                "ingredients" => "Brodo di pesce, pasta di soia fermentata, tofu, alghe, cipollotti",
                "price" => 2, 00,
                "img" => "img/zuppa_di_miso.jpg",
            ],
            [
                "restaurant_id" => 2,
                "name" => "Tè verde",
                "ingredients" => "Acqua, foglie di tè verde",
                "price" => 1, 50,
                "img" => "img/te_verde.jpg",
            ],
            [
                "restaurant_id" => 2,
                "name" => "Sake",
                "ingredients" => "Acqua, riso fermentato, alcool",
                "price" => 3, 00,
                "img" => "img/sake.jpg",
            ],
            [
                "restaurant_id" => 2,
                "name" => "Ramune",
                "ingredients" => "Acqua, zucchero, anidride carbonica, aromi",
                "price" => 2, 00,
                "img" => "img/ramune.jpg",
            ],
            [
                "restaurant_id" => 2,
                "name" => "Gelato al tè verde",
                "ingredients" => "Latte, panna, zucchero, thè verde in polvere",
                "price" => 2, 50,
                "img" => "img/gelato_al_te_verde.jpg",
            ],
            [
                "restaurant_id" => 2,
                "name" => "Mochi",
                "ingredients" => "Riso glutinoso, ripieno dolce, farina di riso",
                "price" => 2, 00,
                "img" => "img/mochi.jpg",
            ],
            //pizzeria 
            [
                "restaurant_id" => 3,
                "name" => "Pizza capricciosa",
                "ingredients" => "Pomodoro, mozzarella, prosciutto, funghi, carciofi, olive",
                "price" => 9, 00,
                "img" => "img/pizza_capricciosa.jpg",
            ],
            [
                "restaurant_id" => 3,
                "name" => "Pizza quattro formaggi",
                "ingredients" => "Pomodoro, mozzarella, gorgonzola, fontina, parmigiano",
                "price" => 8, 50,
                "img" => "img/pizza_quattro_formaggi.jpg",
            ],
            [
                "restaurant_id" => 3,
                "name" => "Pizza diavola",
                "ingredients" => "Pomodoro, mozzarella, salame piccante",
                "price" => 8, 00,
                "img" => "img/pizza_diavola.jpg",
            ],
            [
                "restaurant_id" => 3,
                "name" => "Insalata mista",
                "ingredients" => "Lattuga, pomodori, cetrioli, carote, mais, olive",
                "price" => 5, 00,
                "img" => "img/insalata_mista.jpg",
            ],
            [
                "restaurant_id" => 3,
                "name" => "Panna cotta",
                "ingredients" => "Panna, latte, zucchero, gelatina, frutti di bosco",
                "price" => 4, 00,
                "img" => "img/panna_cotta.jpg",
            ],
            [
                "restaurant_id" => 3,
                "name" => "Acqua frizzante",
                "ingredients" => "Acqua, anidride carbonica",
                "price" => 1, 50,
                "img" => "img/acqua_frizzante.jpg",
            ],
            [
                "restaurant_id" => 3,
                "name" => "Aranciata",
                "ingredients" => "Acqua, zucchero, succo di arancia, anidride carbonica, aromi",
                "price" => 2, 00,
                "img" => "img/aranciata.jpg",
            ],
            [
                "restaurant_id" => 3,
                "name" => "Caffè",
                "ingredients" => "Acqua, polvere di caffè",
                "price" => 1, 00,
                "img" => "img/caffe.jpg",
            ],
            [
                "restaurant_id" => 3,
                "name" => "Limoncello",
                "ingredients" => "Alcool, zucchero, limoni, acqua",
                "price" => 3, 00,
                "img" => "img/limoncello.jpg",
            ],
            [
                "restaurant_id" => 3,
                "name" => "Spritz",
                "ingredients" => "Prosecco, Aperol, acqua frizzante, arancia",
                "price" => 4, 00,
                "img" => "img/spritz.jpg",
            ],
            //ristorante
            [
                "restaurant_id" => 4,
                "name" => "Spaghetti alla carbonara",
                "ingredients" => "Spaghetti, uova, pancetta, pecorino, pepe",
                "price" => 8, 00,
                "img" => "img/spaghetti_alla_carbonara.jpg",
            ],
            [
                "restaurant_id" => 4,
                "name" => "Lasagna al forno",
                "ingredients" => "Sfoglia di pasta, ragù, besciamella, mozzarella, parmigiano",
                "price" => 9, 00,
                "img" => "img/lasagna_al_forno.jpg",
            ],
            [
                "restaurant_id" => 4,
                "name" => "Melanzane alla parmigiana",
                "ingredients" => "Melanzane, pomodoro, mozzarella, parmigiano, basilico",
                "price" => 7, 00,
                "img" => "img/melanzane_alla_parmigiana.jpg",
            ],
            [
                "restaurant_id" => 4,
                "name" => "Pollo alla cacciatora",
                "ingredients" => "Pollo, pomodoro, cipolla, carota, sedano, vino bianco, rosmarino, salvia",
                "price" => 10, 00,
                "img" => "img/pollo_alla_cacciatora.jpg",
            ],
            [
                "restaurant_id" => 4,
                "name" => "Tiramisù",
                "ingredients" => "Savoiardi, caffè, mascarpone, uova, zucchero, cacao",
                "price" => 5, 00,
                "img" => "img/tiramisu.jpg",
            ],
            [
                "restaurant_id" => 4,
                "name" => "Acqua minerale",
                "ingredients" => "Acqua, sali minerali",
                "price" => 1, 50,
                "img" => "img/acqua_minerale.jpg",
            ],
            [
                "restaurant_id" => 4,
                "name" => "Vino rosso",
                "ingredients" => "Uva, lieviti, alcool",
                "price" => 3, 00,
                "img" => "img/vino_rosso.jpg",
            ],
            [
                "restaurant_id" => 4,
                "name" => "Limoncello",
                "ingredients" => "Limoni, alcool, zucchero, acqua",
                "price" => 4, 00,
                "img" => "img/limoncello.jpg",
            ],
            [
                "restaurant_id" => 4,
                "name" => "Cappuccino",
                "ingredients" => "Caffè, latte, schiuma di latte",
                "price" => 2, 00,
                "img" => "img/cappuccino.jpg",
            ],
            [
                "restaurant_id" => 4,
                "name" => "Gelato",
                "ingredients" => "Latte, panna, zucchero, aromi",
                "price" => 3, 00,
                "img" => "img/gelato.jpg",
            ],
            //Messicano
            [
                "restaurant_id" => 5,
                "name" => "Burrito",
                "ingredients" => "Tortilla di farina, carne, fagioli, riso, formaggio, salsa",
                "price" => 7, 00,
                "img" => "img/burrito.jpg",
            ],
            [
                "restaurant_id" => 5,
                "name" => "Taco",
                "ingredients" => "Tortilla di mais, carne, verdure, formaggio, salsa",
                "price" => 5, 00,
                "img" => "img/taco.jpg",
            ],
            [
                "restaurant_id" => 5,
                "name" => "Nachos",
                "ingredients" => "Triangoli di mais fritti, formaggio fuso, salsa, panna acida, guacamole",
                "price" => 6, 00,
                "img" => "img/nachos.jpg",
            ],
            [
                "restaurant_id" => 5,
                "name" => "Enchilada",
                "ingredients" => "Tortilla di mais, carne, salsa di pomodoro piccante, formaggio, panna acida",
                "price" => 8, 00,
                "img" => "img/enchilada.jpg",
            ],
            [
                "restaurant_id" => 5,
                "name" => "Churros",
                "ingredients" => "Pasta fritta, zucchero, cannella, cioccolato",
                "price" => 4, 00,
                "img" => "img/churros.jpg",
            ],
            [
                "restaurant_id" => 5,
                "name" => "Agua fresca",
                "ingredients" => "Acqua, frutta, zucchero, limone",
                "price" => 2, 00,
                "img" => "img/agua_fresca.jpg",
            ],
            [
                "restaurant_id" => 5,
                "name" => "Margarita",
                "ingredients" => "Tequila, liquore d'arancia, succo di limone, sale, ghiaccio",
                "price" => 4, 00,
                "img" => "img/margarita.jpg",
            ],
            [
                "restaurant_id" => 5,
                "name" => "Horchata",
                "ingredients" => "Acqua, riso, cannella, zucchero, latte",
                "price" => 3, 00,
                "img" => "img/horchata.jpg",
            ],
            [
                "restaurant_id" => 5,
                "name" => "Caffè de olla",
                "ingredients" => "Caffè, acqua, zucchero di canna, cannella",
                "price" => 2, 00,
                "img" => "img/caffe_de_olla.jpg",
            ],
            [
                "restaurant_id" => 5,
                "name" => "Corona",
                "ingredients" => "Birra, malto d'orzo, luppolo, lievito, mais, acqua",
                "price" => 3, 00,
                "img" => "img/corona.jpg",
            ],
        ];
        foreach ($dishes as $dish) {

            $dish_new = new Dish();

            $dish_new->restaurant_id = $dish['restaurant_id'];
            $dish_new->name = $dish['name'];
            $dish_new->ingredients = $dish['ingredients'];
            $dish_new->price = $dish['price'];
            $dish_new->img = $dish['img'];

            $dish_new->save();
        }
    }
}
