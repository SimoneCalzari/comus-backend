<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('types')->paginate(4);
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

    public function search(string $types)
    {
        // Dividi la stringa dei tipi in un array utilizzando la virgola come separatore
        $typesArray = explode(',', $types);

        // Rimuovi eventuali tipi vuoti o non validi
        $typesArray = array_filter($typesArray, 'intval');

        // Se non ci sono tipi specificati, restituisci tutti i ristoranti
        if (empty($typesArray)) {
            $restaurants = Restaurant::with('types')->paginate(4);
            return response()->json([
                'success' => true,
                'results' => $restaurants
            ]);
        }

        // Carica tutti i ristoranti con i tipi associati
        $restaurants = Restaurant::with('types')->get();

        // Array dove verranno memorizzati i ristoranti che corrispondono a tutti i tipi cercati
        $restaurants_searched = [];

        // Ciclo su tutti i ristoranti
        foreach ($restaurants as $restaurant) {
            // Verifica se il ristorante soddisfa tutti i tipi cercati
            $matchesAllTypes = true;
            foreach ($typesArray as $type) {
                $current_restaurant = $restaurant->types()->where('type_id', $type)->first();
                if (!$current_restaurant) {
                    $matchesAllTypes = false;
                    break;
                }
            }
            // Se il ristorante soddisfa tutti i tipi cercati, aggiungilo all'array risultante
            if ($matchesAllTypes) {
                array_push($restaurants_searched, $restaurant);
            }
        }
        // paginazione personalizzata sull'array di ristoranti cercati
        $total = count($restaurants_searched);
        $perPage = 4;
        $currentPage = 1;
        $restaurants_paginated = new LengthAwarePaginator($restaurants_searched, $total, $perPage, $currentPage);
        return response()->json([
            'success' => true,
            'results' => $restaurants_paginated
        ]);
    }
}
