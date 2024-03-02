<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        return view('dashboard', compact('restaurants'));
    }
}
