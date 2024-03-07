<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('types')->get();
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show(string $slug)
    {
        // prendo il ristorante in base allo slug passato
        $restaurant = Restaurant::with('types')->where('slug', $slug)->first();
        // se non trovo il ristorante restituisco risultato vuoto e metto false a success
        if (!$restaurant) {
            return response()->json([
                'success' => false,
                'results' => []
            ]);
        }
        // se ho trovato il ristorante mi prendo anche i suoi piatti 
        $dishes = Dish::where('restaurant_id', $restaurant->id)->orderBy('name')->get();
        // restituisco ristorante e piatti
        return response()->json([
            'success' => true,
            'results' => ['restaurant' => $restaurant, 'dishes' => $dishes]
        ]);
    }

    public function search(string $type)
    {
        // tutti i ristoranti con i tipi
        $restaurants = Restaurant::with('types')->get();
        if (!$type) {
            return response()->json([
                'success' => false,
                'results' => $restaurants
            ]);
        }
        // array dove salvo i ristoranti col tipo cercato
        $restaurants_searched = [];
        // ciclo su tutti i ristoranti, oggetti della collezione restaurants
        foreach ($restaurants as $restaurant) {
            // salvo in una variabile il risultato della ricerca per tipo, se non trova da null che sfrutto nella condizione sotto
            $current_restaurant = $restaurant->types()->where('type_id', $type)->first();
            if ($current_restaurant) {
                // pusho nell'array solo i ristoranti del tipo cercato
                array_push($restaurants_searched, $restaurant);
            }
        }

        return response()->json([
            'success' => true,
            'results' => $restaurants_searched
        ]);
    }
}
