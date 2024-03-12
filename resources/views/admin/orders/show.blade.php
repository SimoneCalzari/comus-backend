@extends('layouts.admin')

@section('content')
    <header class="d-flex justify-content-between align-items-center py-3">
        <h3 class="text-center">Dati utente</h3>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary"><i class="fa-solid fa-backward me-2"></i>Lista
            ordini</a>
    </header>
    <main>


        <h5 class="mb-0">Nome cognome</h5>
        <p>{{ $order->customer_name }}</p>
        <h5 class="mb-0">Indirizzo</h5>
        <p>{{ $order->delivery_address }}</p>
        <h5 class="mb-0">Email</h5>
        <p>{{ $order->email }}</p>
        <h3 class="text-center py-2">Dettagli ordine</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome Piatto</th>
                    <th>Quantità</th>
                    <th>Totale piatto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->pivot->quantity }}</td>
                        <td>{{ $dish->pivot->quantity * $dish->price }} € </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">Totale Ordine</td>
                    <td>{{ $order->final_price }} €</td>
                </tr>
            </tbody>
        </table>
    </main>
@endsection
