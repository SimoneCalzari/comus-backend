<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types =  [
            [
                "name" => "Sushi",
                "image" => "img\sushi.jpg",
            ],
            [
                "name" => "Fast Food",
                "image" => "img\sushi.jpg",
            ],
            [
                "name" => "Pizza",
                "image" => "img\sushi.jpg",
            ],
            [
                "name" => "Cinese",
                "image" => "img\sushi.jpg",
            ],
            [
                "name" => "Messicano",
                "image" => "img\sushi.jpg",
            ],
            [
                "name" => "Italiano",
                "image" => "img\sushi.jpg",
            ],
            [
                "name" => "Hamburger",
                "image" => "img\sushi.jpg",
            ],
            [
                "name" => "Caffè",
                "image" => "img\sushi.jpg",
            ],
            [
                "name" => "Gelateria",
                "image" => "img\sushi.jpg",
            ],
            [
                "name" => "Vegetariano",
                "image" => "img\sushi.jpg",
            ],
        ];

        foreach ($types as $type) {

            $type_new = new Type();
            $type_new->name_type = $type['name'];
            $type_new->image = $type['image'];
            $type_new->save();
        }
    }
}
