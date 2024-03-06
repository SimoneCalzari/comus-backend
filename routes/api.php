<?php

use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// rotta api per prendere tutte le tipologie
Route::get('/types', [TypeController::class, 'index']);
// rotta api per prendere tutti i ristoranti con i tipi
Route::get('/restaurants', [RestaurantController::class, 'index']);
// rotta per prendere i ristoranti della categoria passata
Route::get('/restaurants/search/{type}', [RestaurantController::class, 'search']);
