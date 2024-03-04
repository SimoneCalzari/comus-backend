@extends('layouts.admin')

@section('content')
    <div class="container pb-5">
        <header>
            <h2 class="py-2">Aggiungi un nuovo ristorante</h2>
        </header>
        <p>I campi constrassegnati con * sono obbligatori</p>

        {{-- Validation --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        {{-- Validation --}}


        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nome --}}
            <div class="mb-2">
                <label for="name" class="form-label fw-medium">Nome ristorante<span class="fs-5 px-1">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name"
                    value="{{ old('name') }}" required>
            </div>
            @error('name')
                @foreach ($errors->get('name') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror

            {{-- Indirizzo --}}
            <div class="mb-2">
                <label for="address" class="form-label fw-medium">Indirizzo<span class="fs-5 px-1">*</span></label>
                <input type="text" class="form-control @error('address') is-invalid  @enderror" name="address"
                    value="{{ old('address') }}" required>
            </div>
            @error('address')
                @foreach ($errors->get('address') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror

            {{-- Telefono --}}
            <div class="mb-2">
                <label for="phone_number" class="form-label fw-medium">Telefono<span class="fs-5 px-1">*</span></label>
                <input type="number" class="form-control @error('phone_number') is-invalid  @enderror" name="phone_number"
                    value="{{ old('phone_number') }}" required min="1">
            </div>
            @error('phone_number')
                @foreach ($errors->get('phone_number') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror

            {{-- P.Iva --}}
            <div class="mb-2">
                <label for="vat" class="form-label fw-medium">Partita IVA<span class="fs-5 px-1">*</span></label>
                <input type="number" class="form-control @error('VAT') is-invalid  @enderror" name="VAT"
                    value="{{ old('VAT') }}" required min="1">
            </div>
            @error('VAT')
                @foreach ($errors->get('VAT') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror

            {{-- Immagine --}}
            <div class="mb-2">
                <label for="image" class="form-label fw-medium">Inserisci un'immagine<span
                        class="fs-5 px-1">*</span></label>
                <input class="form-control @error('img') is-invalid  @enderror" type="file" name="img" required>
            </div>
            @error('img')
                @foreach ($errors->get('img') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror

            {{-- Categoria --}}
            <h6 class="fw-medium">Categorie<span class="fs-5 px-1">*</span></h6>
            <div class="mb-2 form-check">
                @foreach ($types as $type)
                    <div class="form-check-inline">
                        <label class="form-check-label me-4" for="types">{{ $type->name_type }}</label>
                        <input type="checkbox" class="form-check-input" name="types[]" value="{{ $type->id }}"
                            @if (in_array($type->id, old('types', []))) checked @endif>
                    </div>
                @endforeach
            </div>
            @error('types')
                @foreach ($errors->get('types') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror

            <button type="submit" class="btn btn-primary mt-2 me-3">Crea</button>
            {{-- <button type="reset" class="btn btn-warning mt-2">Svuota Campi</button> --}}
        </form>

    </div>
@endsection
