<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->first();
        $orders = Order::where('restaurant_id', $restaurants->id)->orderByDesc('created_at')->get();
        $restaurants_passare = Restaurant::where('user_id', Auth::user()->id)->get();
        return view('admin.orders.index', compact('orders', 'restaurants_passare'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $current_restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        if ($order->restaurant_id === $current_restaurant->id) {
            $restaurants_passare = Restaurant::where('user_id', Auth::user()->id)->get();
            return view('admin.orders.show', compact('order', 'restaurants_passare'));
        }
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
