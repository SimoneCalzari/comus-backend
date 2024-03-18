@extends('layouts.admin')

@section('content')

    <header class="d-flex justify-content-between align-items-center py-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary"><i class="fa-solid fa-backward me-lg-2"></i><span
                class="d-none d-lg-inline">Area
                amministrazione</span></a>
        <h2 class="text-uppercase">Lista Piatti</h2>
        <div>
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-success"><i class="fa-solid fa-plus me-lg-2">
                </i><span class="d-none d-lg-inline">Aggiungi un piatto</span></a>
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
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo</th>
                    <th class="d-none d-lg-table-cell" scope="col">Immagine</th>
                    <th class="d-none d-lg-table-cell" scope="col">Disponibilità</th>
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
                        <td class="d-none d-lg-table-cell">
                            <div class="cont-img-list d-flex align-items-center justify-content-center">
                                @if ($dish->img)
                                    <img src="{{ asset('storage/' . $dish->img) }}" alt="{{ $dish->name }}">
                                @else
                                    <i class="fa-solid fa-xmark fs-2 text-danger"></i>
                                @endif
                            </div>
                        </td>
                        <td class="d-none d-lg-table-cell">
                            @if ($dish->is_visible == '1')
                                <i class="fa-solid fa-thumbs-up text-success fs-4"></i>
                            @else
                                <i class="fa-solid fa-thumbs-down text-danger fs-4"></i>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-info"><i
                                    class="fa-solid fa-circle-info me-lg-2"></i><span class="d-none d-lg-inline">Dettaglio
                                    piatto</span> </a>

                            <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning" role="button"><i
                                    class="fa-solid fa-pen-to-square me-lg-2"></i><span
                                    class="d-none d-lg-inline">Modifica</span> </a>
                            <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST" class="d-inline">
                                <!--token-->
                                @csrf
                                <!--/token-->
                                <!--method per cancellare-->
                                @method('DELETE')
                                <!--/method per cancellare-->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#piatto-{{ $loop->index }}">
                                    <i class="fa-solid fa-trash-can me-lg-2"></i><span
                                        class="d-none d-lg-inline">Elimina</span>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="piatto-{{ $loop->index }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title fs-5 text-danger " id="exampleModalLabel">
                                                    Conferma cancellazione piatto</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start ">
                                                <h4>Sei sicuro di voler cancellare
                                                    {{ $dish->name }}?</h4>
                                                <span>Una volta cancellato il piatto,
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
