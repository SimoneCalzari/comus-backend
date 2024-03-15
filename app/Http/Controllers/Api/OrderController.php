<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\NewOrderRestaurant;
use App\Mail\NewOrderUser;
use App\Models\Order;
use App\Models\Restaurant;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store()
    {
        $data = request()->all();
        $order = new Order();
        $order->restaurant_id = $data['cart'][0]['restaurant_id'];
        $order->customer_name = $data['formData']['customer_name'];
        $order->phone_number = $data['formData']['phone_number'];
        $order->email = $data['formData']['email'];
        $order->date = new DateTime('now', new DateTimeZone('Europe/Rome'));
        $order->delivery_address = $data['formData']['delivery_address'];
        $order->final_price = $data['totalPrice'];
        $order->save();


        foreach ($data['cart'] as $dish) {
            $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
        };

        //invio mail/notifica a utente che ordina
        Mail::to($order->email)->send(new NewOrderUser($order));

        // invio mail/notifica al ristoratore
        $restaurant = Restaurant::where('id', $order->restaurant_id)->first();
        Mail::to($restaurant->user->email)->send(new NewOrderRestaurant($order));

        return response()->json([
            'status' => true,
            'message' => 'L\'ordine è avvenuto con successo'
        ]);
    }
}
