<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {

        $order = new Order();
        $order->fill($request->all());
        $order->save();
        return response()->json([
            'results' => $order
        ]);
    }
}
