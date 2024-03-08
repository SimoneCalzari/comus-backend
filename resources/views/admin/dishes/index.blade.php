@extends('layouts.admin')

@section('content')

    <header class="d-flex justify-content-between align-items-center py-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary"><i class="fa-solid fa-backward me-2"></i>Area
            amministrazione</a>
        <h2 class="text-center text-uppercase">Lista Piatti</h2>
        <div class="text-center">
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Aggiungi
                un
                piatto</a>
        </div>
    </header>

    {{-- pop up --}}
    @if (session('message'))
        <div class="alert alert-warning" role="alert">
            {{ session('message') }}
        </div>
    @endif


    @if ($dishes->count() < 1)
        <p>Non ci sono ancora piatti registrati</p>
    @else
        <p>Hai <span class="fw-bold fs-6">{{ $dishes->count() }}</span> piatti registrati</p>
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
                            {{-- @if ($dish->img)
                                <span class="badge text-bg-success">Allegato</span>
                            @else
                                <span class="badge text-bg-warning">Nessuna Immagine</span>
                            @endif --}}
                        </td>
                        <td class>
                            @if ($dish->is_visible == '1')
                                <i class="fa-solid fa-thumbs-up text-success fs-4"></i>
                            @else
                                <i class="fa-solid fa-thumbs-down text-danger fs-4"></i>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-info"><i
                                    class="fa-solid fa-circle-info me-2"></i>Dettaglio piatto</a>

                            <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning" role="button"><i
                                    class="fa-solid fa-pen-to-square me-2"></i>Modifica</a>
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
                                    <i class="fa-solid fa-trash-can me-2"></i>Elimina
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

@endsection
