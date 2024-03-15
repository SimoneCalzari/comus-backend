@extends('layouts.admin')

@section('content')

    <header class="d-flex justify-content-between align-items-center py-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary"><i class="fa-solid fa-backward me-lg-2"></i><span
                class="d-none d-lg-inline">Area
                amministrazione</span></a>
        <h2 class="text-uppercase">Lista Ordini</h2>
        <div></div>
    </header>

    {{-- pop up --}}
    @if (session('message'))
        <div class="alert alert-warning" role="alert">
            {{ session('message') }}
        </div>
    @endif


    @if ($orders->count() < 1)
        <p>Non ci sono ancora ordini registrati</p>
    @else
        <p>Hai <span class="fw-bold fs-6">{{ $orders->count() }}</span> ordini registrati</p>
        <table class="table align-middle ">
            <thead>
                <tr>
                    {{-- <th scope="col">Id Ordine</th> --}}
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Nome utente</th>
                    <th class="d-none d-lg-table-cell" scope="col">Email</th>
                    <th class="d-none d-lg-table-cell" scope="col">Piatti</th>
                    <th scope="col">Conto</th>
                    <!--bottoni-->
                    <th scope="col"></th>
                    <!--/bottoni-->
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ substr($order->date, 8, 2) . '-' . substr($order->date, 5, 3) . substr($order->date, 0, 4) }}
                        </td>
                        <td>{{ substr($order->date, 11, 5) }}</td>
                        <td>{{ $order->customer_name }} </td>
                        <td class="d-none d-lg-table-cell">{{ $order->email }} </td>
                        <td class="d-none d-lg-table-cell">
                            @php
                                $total_dishes = 0;
                                foreach ($order->dishes as $dish) {
                                    $total_dishes += $dish->pivot->quantity;
                                }
                                echo $total_dishes;
                            @endphp
                        </td>
                        <td>{{ $order->final_price }} €</td>
                        <td class="text-end">
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-info"><i
                                    class="fa-solid fa-circle-info me-lg-2"></i><span class="d-none d-lg-inline">Dettaglio
                                    ordine</span></a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
