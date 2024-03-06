<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $types = Restaurant::with('types')->get();
        return response()->json([
            'success' => true,
            'results' => $types
        ]);
    }
}
