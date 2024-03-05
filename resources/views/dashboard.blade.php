@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Area amministrazione') }}</div>
                    {{-- <a href="{{ route('admin.restaurants.create') }}" class="btn btn-warning">Aggiungi ristorante</a> --}}
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
                        <div class="container text-center">
                            <div class="row align-items-start">
                                @foreach ($restaurants as $restaurant)
                                    <div class="col">
                                        <div class="card" style="width: 18rem;">
                                            @if ($restaurant->img)
                                                <img src="{{ asset('storage/' . $restaurant->img) }}" class="card-img-top"
                                                    alt="img-{{ $restaurant->id }}">
                                            @else
                                                <img src="https://beachlife.com/image/wiser2/1445570/sfeer_afbeeldingen/730/1009/6/beachlife-black-embroidery-bikinitop-109a-bikinibroekje-206b-top-jpg-8.jpg"
                                                    alt="no-image">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $restaurant->name_restaurant }}</h5>
                                                <p class="card-text">{{ $restaurant->address }}</p>
                                                <p class="card-text">{{ $restaurant->phone_number }}</p>
                                                <p>
                                                    @foreach ($restaurant->types as $type)
                                                        <span>{{ $type->name_type }}</span>
                                                    @endforeach
                                                </p>
                                                <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">Lista
                                                    Piatti</a>
                                            </div>
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

    <div class="container d-flex justify-content-center mt-3">
        @if ($restaurants->count() < 1)
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary">Aggiungi il tuo ristorante</a>
        @endif
    </div>
@endsection
