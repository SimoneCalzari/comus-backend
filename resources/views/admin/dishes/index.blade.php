@extends('layouts.admin')

@section('content')

    <h2>Lista Piatti</h2>

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
                <td >{{ $dish->id }}</td>
                <td>{{ $dish->name }}</td>
                <td>{{ $dish->price }}</td>
                <td>
                    @if ($dish->img)
                    <span class="badge text-bg-success">Allegato</span>
                    @endif
                </td>
                <td class="text-end">
                    <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-info" role="button">Dettaglio piatto</a>
                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-primary" role="button">Modifica</a>
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
@endsection
