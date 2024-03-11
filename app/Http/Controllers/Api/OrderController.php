<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store()
    {
        // $data = request()->validate([
        //     'restaurant_id' => 'required';
        //     'date' => '';
        //     'customer_name' => '';
        //     'email' => '';
        //     'delivery_address' => '';
        //     'final_price' => '';

        // ])

        // $data= $request 
       $order = new Order();
       $order->restaurant_id = 
    }
}
