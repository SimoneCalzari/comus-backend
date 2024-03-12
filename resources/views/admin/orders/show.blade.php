@extends('layouts.admin')

@section('content')
    <header class="d-flex justify-content-between align-items-center py-3">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary"><i class="fa-solid fa-backward me-2"></i>Lista
            oridni</a>
        <h2 class="text-center text-uppercase">{{ $order->name }}</h2>
    </header>
    <div>
        <ul class="container d-flex flex-column gap-2 ">
            <li>Id ordine:{{ $order->id }}</li>
            <li>Data:{{ $order->date }}</li>
            <li>Nome utente:{{ $order->customer_name }}</li>
            <li>Email:{{ $order->email }}</li>
            <li>Lista Piatti: @foreach ($order->dishes as $dish)
                    <span> - {{ $dish->name }}</span>
                @endforeach
            </li>
            <li>Indirizzo di consegna:{{ $order->delivery_address }}</li>
            <li>Prezzo Finale:{{ $order->final_price }}€</li>
        </ul>
    @endsection
