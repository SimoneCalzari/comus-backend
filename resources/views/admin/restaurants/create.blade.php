@extends('layouts.admin')

@section('content')

    {{-- Validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Validation --}}


    <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nome --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nome ristorante</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>

        {{-- Indirizzo --}}
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
        </div>

        {{-- Telefono --}}
        <div class="mb-3">
            <label for="phone_number" class="form-label">Telefono</label>
            <input type="number" class="form-control" placeholder="es. 3463199771" name="phone_number" value="{{ old('phone_number') }}">
        </div>

        {{-- P.Iva --}}
        <div class="mb-3">
            <label for="vat" class="form-label">Partita IVA</label>
            <input type="number" class="form-control" name="VAT" value="{{ old('VAT') }}">
        </div>

        {{-- Immagine --}}
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="img">
        </div>

        {{-- Categoria --}}
        <div class="mb-3 form-check">
            @foreach ($types as $type)
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="types">{{ $type->name_type }}</label>
                    <input type="checkbox" class="form-check-input" name="types[]" value="{{ $type->id }}">
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
@endsection
