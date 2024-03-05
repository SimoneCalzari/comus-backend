@extends('layouts.admin')

@section('content')
    <div class="go-back">
        <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-arrow-left"></i> indietro</a>
    </div>
    <h2 class="text-center pt-3 text-uppercase">Lista Piatti</h2>

    {{-- pop up --}}
    @if (session('message'))
        <div class="alert alert-warning" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="container d-flex justify-content-center mt-5">
        @if ($dishes->count() < 1)
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Aggiungi Piatti</a>
        @else
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Immagine</th>
                <!--bottoni-->
                <th scope="col"></th>
                <!--/bottoni-->
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
                <tr>
                    <td>{{ $dish->id }}</td>
                    <td>{{ $dish->name }}</td>
                    <td>{{ $dish->price }} €</td>
                    <td>
                        @if ($dish->img)
                            <span class="badge text-bg-success">Allegato</span>
                        @else
                            <span class="badge text-bg-warning">Nessuna Immagine</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-primary" role="button">Dettaglio
                            piatto</a>
                        <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning" role="button">Modifica</a>
                        <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST" class="d-inline">
                            <!--token-->
                            @csrf
                            <!--/token-->
                            <!--method per cancellare-->
                            @method('DELETE')
                            <!--/method per cancellare-->
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif



@endsection
