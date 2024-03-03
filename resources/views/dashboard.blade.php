@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-warning">Aggiungi ristorante</a>
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
                                            <img src="{{ $restaurant->img }}" class="card-img-top" alt="img-{{ $restaurant->id }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $restaurant->name }}</h5>
                                                <p class="card-text">{{ $restaurant->address }}</p>
                                                <p class="card-text">{{ $restaurant->phone_number }}</p>
                                                <a href="#" class="btn btn-primary">Lista Piatti</a>
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
@endsection
