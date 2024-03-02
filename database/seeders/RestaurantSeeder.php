<?php

namespace Database\Seeders;

use App\Models\Restaurant;
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
        $users = User::all();
        $index = 1;
        foreach ($users as $user) {
            $restaurant = new Restaurant();
            $restaurant->user_id = $user->id;
            $restaurant->name = 'Ristorante prova';
            $restaurant->address = 'Viale Roma ' . $index;
            $restaurant->slug = Str::of($restaurant->name)->slug('-');
            $restaurant->phone_number = '+39 3517776661';
            $restaurant->VAT = '15454684512';
            $restaurant->img = 'https://picsum.photos/200/300';
            $restaurant->save();
            $index++;
        }
    }
}
