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
        return view('admin.dishes.index', compact('dishes'));
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

        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        $dish->restaurant_id = $restaurant->id;

        $dish->save();
        return redirect()->route('admin.dishes.index')->with('message', "Il piatto $dish->name  è stato aggiunto ai tuoi piatti");
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
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {

        $data = $request->validated();


        if ($data['is_visible'] === 1) {
            $dish->is_visible = true;
        } else {
            $dish->is_visible = false;
        }


        if (!empty($data['img'])) {
            if ($dish->img) {
                Storage::delete($dish->img);
            }
            $dish->img = Storage::put('uploads', $data['img']);
        }

        $dish->update($data);



        return redirect()->route('admin.dishes.index', $dish)->with('message', 'Modifica avvenuta con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        if ($dish->img) {
            Storage::delete($dish->img);
        }

        return redirect()->route('admin.dishes.index')->with('message', 'Cancellato con successo!');
    }
}
