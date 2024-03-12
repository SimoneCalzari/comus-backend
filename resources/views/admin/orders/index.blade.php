@extends('layouts.admin')

@section('content')

    <header class="d-flex justify-content-between align-items-center py-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary"><i class="fa-solid fa-backward me-2"></i>Area
            amministrazione</a>
        <h2 class="text-center text-uppercase">Lista Ordini</h2>
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
        <table class="table">
            <thead>
                <tr>
                    {{-- <th scope="col">Id Ordine</th> --}}
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Nome utente</th>
                    <th scope="col">Email</th>
                    <!--bottoni-->
                    <th scope="col"></th>
                    <!--/bottoni-->
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        {{-- <td>{{ $order->id }}</td> --}}
                        <td>{{ substr($order->date, 8, 2) . '-' . substr($order->date, 5, 3) . substr($order->date, 0, 4) }}
                        </td>
                        <td>{{ substr($order->date, 11, 5) }}</td>
                        <td>{{ $order->customer_name }} </td>
                        <td>{{ $order->email }} </td>

                        <td class="text-end">
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-info"><i
                                    class="fa-solid fa-circle-info me-2"></i>Dettaglio ordine</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
