@extends('layouts.admin')
@section('content')
    <h1 class="text-center text-uppercase">{{ $dish->name }}</h1>
    <div class="container d-flex">
        <img class="my-admin-image" src="{{ asset('storage/' . $dish->img) }}" alt="{{ $dish->name}}">
        <div class="ms-3">
            <h3>Ingredienti</h3>
            <p>{{ $dish->ingredients }}</p>
            <h3>Prezzo</h3>
            <p>{{ $dish->price }} €</p>
            <p> {{ $dish->is_visible ? 'Disponibile' : 'Non disponibile' }}</p>
        </div>
    </div>
    <div>
        <!--bottone per di creare un nuovo progetto-->
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-warning my-3">Torna alla lista piatti</a>
        <!--/bottone per di creare un nuovo progetto-->
    </div>
@endsection