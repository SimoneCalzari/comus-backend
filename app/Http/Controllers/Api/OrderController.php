<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    // public function store(StoreOrderRequest $request)
    public function store()
    {
        //  {
        //     formData: this.formData,
        //     cart: this.store.cart,
        //     totalPrice: this.store.totalPrice,
        //   };
        $data = request()->all();
        $order = new Order();
        $order->restaurant_id = $data['cart'][0]['restaurant_id'];
        $order->customer_name = $data['formData']['customer_name'];
        $order->email = $data['formData']['email'];
        $order->delivery_address = $data['formData']['delivery_address'];
        $order->final_price = $data['totalPrice'];
        $order->save();

        $dishes_ids = [];
        foreach ($data['cart'] as $dish) {
            array_push($dishes_ids, $dish->id);
        }

        $order->dishes()->sync($dishes_ids);
    }
}
