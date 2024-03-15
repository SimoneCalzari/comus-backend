@extends('layouts.admin')

@section('content')
    <header class="d-flex justify-content-between align-items-center py-3">
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary"><i class="fa-solid fa-backward me-lg-2"></i><span
                class="d-none d-lg-inline">Lista
                piatti</span></a>
        <h2 class="text-center text-uppercase">{{ $dish->name }}</h2>
        <div class="text-center d-flex gap-3 ">
            <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning"><i
                    class="fa-solid fa-pen-to-square me-lg-2"></i><span class="d-none d-lg-inline">Modifica
                    piatto</span></a>
            <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST" class="d-inline">
                <!--token-->
                @csrf
                <!--/token-->
                <!--method per cancellare-->
                @method('DELETE')
                <!--/method per cancellare-->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#piatto">
                    <i class="fa-solid fa-trash-can me-lg-2"></i><span class="d-none d-lg-inline">Elimina</span>
                </button>
                <!-- Modal -->
                <div class="modal fade bg-black " id="piatto" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-danger " id="exampleModalLabel">
                                    ATTENZIONE</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start ">
                                <h2 class=" text-uppercase">sei sicuro di voler cancellare
                                    {{ $dish->name }}?</h2>
                                <span>Una volta cancellato il piatto,
                                    non
                                    sarà più
                                    possibile recuperarlo.</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </header>
    <div class="container d-flex flex-column align-items-center">


        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="row">
                        <div class="col-md-5">
                            @if ($dish->img == null)
                                <img class="img-fluid rounded-start"
                                    src="data:image/png;base64,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"
                                    alt="no-img">
                            @else
                                <img src="{{ asset('storage/' . $dish->img) }}" class="img-fluid rounded-start"
                                    alt="{{ $dish->name }}">
                            @endif

                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">{{ $dish->name }}</h5>
                                {{-- Ingredienti --}}
                                <p class="card-text">{{ $dish->ingredients }}</p>
                                {{-- Prezzo --}}
                                <p class="fs-3 fw-semibold">{{ $dish->price }} €</p>
                                {{-- Disponibilità --}}
                                <h5>Disponibilità</h5>
                                @if ($dish->is_visible == '1')
                                    <i class="fa-solid fa-thumbs-up text-success fs-4"></i>
                                @else
                                    <i class="fa-solid fa-thumbs-down text-danger fs-4"></i>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
