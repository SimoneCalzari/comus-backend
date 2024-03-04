@extends('layouts.admin')

@section('content')
    <div class="container pb-5">
        <header>
            <h2 class="py-2">modifica piatto</h2>
        </header>
        <p>I campi constrassegnati con * sono obbligatori</p>


        <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            {{-- Nome --}}
            <div class="mb-2">
                <label for="name" class="form-label fw-medium">Nome piatto<span class="fs-5 px-1">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" value="{{ old('name', $dish->name) }}" required>
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
                <input type="text" class="form-control @error('ingredients') is-invalid  @enderror" name="ingredients" value="{{ old('ingredients', $dish->ingredients) }}">
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
                <input type="number" step="0.01" class="form-control @error('price') is-invalid  @enderror" name="price" value="{{ old('price', $dish->price) }}" required min="1">
            </div>
            @error('price')
                @foreach ($errors->get('price') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror

            {{-- Visible --}}
            <span class="fs-5 px-1">Disponibilità:</span>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_visible" id="flexRadioDefault1" value="1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_visible" id="flexRadioDefault2" value="0">
                <label class="form-check-label" for="flexRadioDefault2">
                    No
                </label>
            </div>

            {{-- Immagine --}}
            <div class="mb-2">
                <label for="image" class="form-label fw-medium">Inserisci un'immagine<span class="fs-5 px-1">*</span></label>
                <input class="form-control @error('img') is-invalid  @enderror" type="file" name="img">
            </div>
            @error('img')
                @foreach ($errors->get('img') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror

            <button type="submit" class="btn btn-primary mt-2 me-3">Modifica</button>
            {{-- <button type="reset" class="btn btn-warning mt-2">Svuota Campi</button> --}}
        </form>

    </div>
@endsection
