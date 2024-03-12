<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use DateTime;
use DateTimeZone;

class OrderController extends Controller
{
    public function store()
    {
        $data = request()->all();
        $order = new Order();
        $order->restaurant_id = $data['cart'][0]['restaurant_id'];
        $order->customer_name = $data['formData']['customer_name'];
        $order->email = $data['formData']['email'];
        $order->date = new DateTime('now', new DateTimeZone('Europe/Rome'));
        $order->delivery_address = $data['formData']['delivery_address'];
        $order->final_price = $data['totalPrice'];
        $order->save();


        foreach ($data['cart'] as $dish) {
            $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
        };
        return response()->json([
            'status' => true,
            'message' => 'L\'ordine è avvenuto con successo'
        ]);
    }
}
