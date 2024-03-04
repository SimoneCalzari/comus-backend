<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->first();
        $dishes = Dish::where('restaurant_id', $restaurants->id)->get();
        return view ('admin.dishes.index' , compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('admin.dishes.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $data = $request->validated();
        $dish = new Dish();
        $dish->fill($data);
        if (!empty($data['img'])) {
            $dish->img = Storage::put('uploads', $data['img']);
        }

        $dish->restaurant_id = Auth::user()->id;

        $dish->save();
        return redirect()->route('admin.dishes.index')->with('new_dish', "Il piatto $dish->name  è stato aggiunto ai tuoi piatti");
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
       return view('admin.dishes.show', compact('dish'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
