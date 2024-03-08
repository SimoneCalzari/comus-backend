<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use App\Models\Restaurant;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StoreRestaurantRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreRestaurantRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->slug = Str::of($restaurant->name_restaurant)->slug('-');
        if (!empty($data['img'])) {
            $restaurant->img = Storage::put('uploads', $data['img']);
        }

        $restaurant->user_id = $user->id;

        $restaurant->save();

        if (isset($data['types'])) {
            $restaurant->types()->sync($data['types']);
        }

        event(new Registered($user));

        Auth::login($user);




        return redirect(RouteServiceProvider::HOME)->with('new_restaurant', "Il ristorante $restaurant->name  è stato aggiunto ai tuoi ristoranti");
    }
}
