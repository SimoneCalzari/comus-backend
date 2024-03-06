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
                "image" => "uploads/img/sushi.jpg",
            ],
            [
                "name" => "Fast Food",
                "image" => "uploads/img/fast-food.jpg",
            ],
            [
                "name" => "Pizzeria",
                "image" => "uploads/img/pizza.jpg",
            ],
            [
                "name" => "Cinese",
                "image" => "uploads/img/cinese.jpg",
            ],
            [
                "name" => "Messicano",
                "image" => "uploads/img/messicano.jpg",
            ],
            [
                "name" => "Italiano",
                "image" => "uploads/img/italiano.jpg",
            ],
            [
                "name" => "Steakhouse",
                "image" => "uploads/img/steakhouse.jpg",
            ],
            [
                "name" => "Pesce",
                "image" => "uploads/img/pesce.jpg",
            ],
            [
                "name" => "Kebab",
                "image" => "uploads/img/kebab.jpg",
            ],
            [
                "name" => "Gluten Free",
                "image" => "uploads/img/gluten-free.jpg",
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
