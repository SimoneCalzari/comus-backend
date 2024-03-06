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
        @else
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Immagine</th>
                <th scope="col">Disponibilità</th>
                <!--bottoni-->
                <th scope="col"></th>
                <!--/bottoni-->
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
                <tr>
                    <td>{{ $dish->name }}</td>
                    <td>{{ $dish->price }} €</td>
                    <td>
                        @if ($dish->img)
                            <span class="badge text-bg-success">Allegato</span>
                        @else
                            <span class="badge text-bg-warning">Nessuna Immagine</span>
                        @endif
                    </td>
                    <td>
                        @if ($dish->is_visible == '1')
                            <span class="text-success fw-semibold">Disponibile</span>
                        @else
                            <span class="text-danger fw-semibold">Non disponibile</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-primary" role="button">Dettaglio
                            piatto</a>
                        <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning"
                            role="button">Modifica</a>
                        <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST" class="d-inline">
                            <!--token-->
                            @csrf
                            <!--/token-->
                            <!--method per cancellare-->
                            @method('DELETE')
                            <!--/method per cancellare-->
                            {{-- <button class="btn btn-danger">Elimina</button> --}}


                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#piatto-{{ $loop->index }}">
                                Elimina
                            </button>

                            <!-- Modal -->
                            <div class="modal fade bg-black " id="piatto-{{ $loop->index }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-danger " id="exampleModalLabel">
                                                ATTENZIONE</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start ">
                                            <h2 class="text-danger text-uppercase">sei sicuro di voler cancellare
                                                {{ $dish->name }}?</h2>
                                            <span class="text-danger">Una volta cancellato il piatto,
                                                non
                                                sarà più
                                                possibile recuperarlo.</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Chiudi</button>
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <div class="text-center">
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Aggiungi un piatto</a>
    </div>
@endsection
