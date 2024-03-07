<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants =  [
            [
                "user_id" => 1,
                "name_restaurant" => "Mc Food",
                "address" => "Via Roma, 22",
                "phone_number" => "3517776661",
                "VAT" => "15454684512",
                "img" => "uploads/img/mc_food.jpg",
                "types" => [2],
            ],
            [
                "user_id" => 2,
                "name_restaurant" => "Hokkaido",
                "address" => "Via Italia, 11",
                "phone_number" => "3204789654",
                "VAT" => "00487965413",
                "img" => "uploads/img/hokkaido.jpg",
                "types" => [1, 4],
            ],
            [
                "user_id" => 3,
                "name_restaurant" => "Pizzeria La Pergola",
                "address" => "Via della Moscova, 20",
                "phone_number" => "3517776662",
                "VAT" => "15454684513",
                "img" => "uploads/img/la_pergola.jpg",
                "types" => [3, 6],
            ],
            [
                "user_id" => 4,
                "name_restaurant" => "Ristorante Osteria Francescana",
                "address" => "Via Stella, 22",
                "phone_number" => "38014567963",
                "VAT" => "15454684514",
                "img" => "uploads/img/osteria_francescana.jpg",
                "types" => [6, 8],
            ],
            [
                "user_id" => 5,
                "name_restaurant" => "Gluten Free Le Calandre",
                "address" => "Via Liguria, 1",
                "phone_number" => "3517778965",
                "VAT" => "15454684515",
                "img" => "uploads/img/le_calandre.jpg",
                "types" => [5, 10],
            ],
        ];

        foreach ($restaurants as $restaurant) {

            $restaurant_new = new Restaurant();

            $restaurant_new->user_id = $restaurant['user_id'];
            $restaurant_new->name_restaurant = $restaurant['name_restaurant'];
            $restaurant_new->address = $restaurant['address'];
            $restaurant_new->slug = Str::of($restaurant['name_restaurant'])->slug('-');
            $restaurant_new->phone_number = $restaurant['phone_number'];
            $restaurant_new->VAT = $restaurant['VAT'];
            $restaurant_new->img = $restaurant['img'];

            $restaurant_new->save();
            $restaurant_new->types()->attach($restaurant['types']);
        }
    }
}

// class RestaurantSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         $users = User::all();
//         $types = Type::all();
//         $index = 1;
//         foreach ($users as $user) {
//             $restaurant = new Restaurant();
//             $restaurant->user_id = $user->id;
//             $restaurant->name_restaurant = 'Ristorante prova';
//             $restaurant->address = 'Viale Roma ' . $index;
//             $restaurant->slug = Str::of($restaurant->name)->slug('-');
//             $restaurant->phone_number = '+39 3517776661';
//             $restaurant->VAT = '15454684512';
//             $restaurant->img = 'img/sushi.jpg';
//             $restaurant->save();
//             $randomTypes = $types->random(2)->pluck('id');
//             $restaurant->types()->attach($randomTypes);
//             $index++;
//         }
//     }
// }
