@extends('layouts.admin')

@section('content')
    <div class="container pb-4 font-secondary">

        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header fs-5 fw-medium">I tuoi dati</div>
                    @if (session('new_restaurant'))
                        <div class="alert alert-success" role="alert">
                            {{ session('new_restaurant') }}
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col">
                                    @foreach ($restaurants as $restaurant)
                                        <header class="d-flex justify-content-between align-items-center">
                                            <h2 class="py-2">{{ $restaurant->name_restaurant }}</h2>
                                            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">Lista
                                                Piatti</a>
                                        </header>

                                        <div class="mb-3 w-50">
                                            <img src="{{ asset('storage/' . $restaurant->img) }}" alt="non disponibile"
                                                class="img-fluid">
                                        </div>
                                        <div class="mb-3">
                                            <h4 class="mb-0">Categorie</h4>
                                            <p class="fs-5">
                                                @foreach ($restaurant->types as $type)
                                                    @if ($loop->last)
                                                        {{ $type->name_type }}
                                                    @else
                                                        {{ $type->name_type }},
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <h4 class="mb-0">Recapito telefonico</h4>
                                            <p class="fs-5">{{ $restaurant->phone_number }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <h4 class="mb-0">Indirizzo</h4>
                                            <p class="fs-5">{{ $restaurant->address }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <h4 class="mb-0">Partita Iva</h4>
                                            <p class="fs-5">{{ $restaurant->VAT }}</p>
                                        </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container d-flex justify-content-center mt-3">
        @if ($restaurants->count() < 1)
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary">Aggiungi il tuo ristorante</a>
        @endif
    </div> --}}
@endsection
