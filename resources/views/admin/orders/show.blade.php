@extends('layouts.admin')

@section('content')
    <header class="d-flex justify-content-between align-items-center py-3">
        <h3 class="text-center">Dati utente</h3>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary"><i class="fa-solid fa-backward me-lg-2"></i><span
                class="d-none d-lg-inline">Lista
                piatti</span></a>
    </header>

    <h5 class="mb-0">Nome cognome</h5>
    <p>{{ $order->customer_name }}</p>
    <h5 class="mb-0">Indirizzo</h5>
    <p>{{ $order->delivery_address }}</p>
    <h5 class="mb-0">Telefono</h5>
    <p>{{ $order->phone_number }}</p>
    <h5 class="mb-0">Email</h5>
    <p>{{ $order->email }}</p>
    <h5 class="mb-0">Data ordinazione</h5>
    <p>{{ substr($order->date, 8, 2) . '-' . substr($order->date, 5, 3) . substr($order->date, 0, 4) }}</p>
    <h5 class="mb-0">Ora ordinazione</h5>
    <p>{{ substr($order->date, 11, 5) }}</p>
    <h3 class="text-center py-2">Dettagli ordine</h3>
    <table class="table mb-5">
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
                <th>Totale</th>
                <th>
                    @php
                        $total_dishes = 0;
                        foreach ($order->dishes as $dish) {
                            $total_dishes += $dish->pivot->quantity;
                        }
                        echo $total_dishes;
                    @endphp
                </th>
                <th>{{ $order->final_price }} €</th>
            </tr>
        </tbody>
    </table>
@endsection
