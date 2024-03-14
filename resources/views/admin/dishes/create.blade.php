@extends('layouts.admin')

@section('content')
    <div class="container pb-5">
        <header class="d-flex justify-content-between align-items-center py-3">
            <h2 class="text-center text-uppercase ">Aggiungi un nuovo piatto</h2>
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary"><i
                    class="fa-solid fa-backward me-lg-2"></i><span class="d-none d-lg-inline">Lista
                    piatti</span></a>
        </header>
        <p>I campi constrassegnati con * sono obbligatori</p>


        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nome --}}
            <div class="mb-2">
                <label for="name" class="form-label fw-medium">Nome piatto<span class="fs-5 px-1">*</span></label>
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

            {{-- Ingredienti --}}
            <div class="mb-2">
                <label for="ingredients" class="form-label fw-medium">Ingredienti</label>
                <input type="text" class="form-control @error('ingredients') is-invalid  @enderror" name="ingredients"
                    value="{{ old('ingredients') }}">
            </div>
            @error('ingredients')
                @foreach ($errors->get('ingredients') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror

            {{-- Price --}}
            <div class="mb-2">
                <label for="price" class="form-label fw-medium">Prezzo<span class="fs-5 px-1">*</span></label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid  @enderror"
                    name="price" value="{{ old('price') }}" required min="0.01">
            </div>
            @error('price')
                @foreach ($errors->get('price') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror
            {{-- Visible --}}
            <div class="mb-2">
                <label class=" form-label fw-medium">Visibilità sul sito:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_visible" id="yes-visible" value="1"
                        {{ old('is_visible') == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="yes-visible">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_visible" id="no-visible" value="0"
                        {{ old('is_visible') == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="no-visible">
                        No
                    </label>
                </div>
            </div>
            {{-- <div class="fs-5 py-2 ">Visibilità sul sito:</div> --}}


            {{-- Immagine --}}
            <div class="mb-2">
                <label for="image" class="form-label fw-medium">Inserisci un'immagine</label>
                <input class="form-control @error('img') is-invalid  @enderror" type="file" name="img">
            </div>
            @error('img')
                @foreach ($errors->get('img') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror
            <button type="submit" class="btn btn-primary mt-2 me-3">Aggiungi il tuo piatto</button>
        </form>

    </div>
@endsection
