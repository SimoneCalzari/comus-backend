@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrazione') }}</div>

                    <div class="card-body">
                        <header>
                            <h2 class="py-2">Aggiungi un nuovo ristorante</h2>
                        </header>
                        <p>I campi constrassegnati con * sono obbligatori</p>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- Nome utente --}}
                            <div class="mb-2">
                                <label for="name" class="form-label fw-medium">{{ __('Nome Utente') }} <span
                                        class="fs-5 px-1">*</span></label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Email --}}
                            <div class="mb-2">
                                <label for="email" class="form-label fw-medium">{{ __('Indirizzo Mail') }} <span
                                        class="fs-5 px-1">*</span></label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Password --}}
                            <div class="mb-2">
                                <label for="password" class="form-label fw-medium">{{ __('Password') }}<span
                                        class="fs-5 px-1">*</span></label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Conferma Password --}}
                            <div class="mb-2">
                                <label for="password-confirm"
                                    class="form-label fw-medium">{{ __('Conferma Password') }}<span
                                        class="fs-5 px-1">*</span></label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            {{-- Nome --}}
                            <div class="mb-2">
                                <label for="name_restaurant" class="form-label fw-medium">Nome ristorante<span
                                        class="fs-5 px-1">*</span></label>
                                <input type="text" class="form-control @error('name_restaurant') is-invalid  @enderror"
                                    name="name_restaurant" value="{{ old('name_restaurant') }}" required>
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
                                <label for="address" class="form-label fw-medium">Indirizzo<span
                                        class="fs-5 px-1">*</span></label>
                                <input type="text" class="form-control @error('address') is-invalid  @enderror"
                                    name="address" value="{{ old('address') }}" required>
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
                                <label for="phone_number" class="form-label fw-medium">Telefono<span
                                        class="fs-5 px-1">*</span></label>
                                <input type="number" class="form-control @error('phone_number') is-invalid  @enderror"
                                    name="phone_number" value="{{ old('phone_number') }}" required min="1">
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
                                <label for="vat" class="form-label fw-medium">Partita IVA<span
                                        class="fs-5 px-1">*</span></label>
                                <input type="number" class="form-control @error('VAT') is-invalid  @enderror"
                                    name="VAT" value="{{ old('VAT') }}" required min="1">
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
                                <label for="img" class="form-label fw-medium">Inserisci un'immagine<span
                                        class="fs-5 px-1">*</span></label>
                                <input class="form-control @error('img') is-invalid  @enderror" type="file"
                                    name="img" required>
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
                                        <label class="form-check-label me-4"
                                            for="types">{{ $type->name_type }}</label>
                                        <input type="checkbox" class="form-check-input" name="types[]"
                                            value="{{ $type->id }}" @if (in_array($type->id, old('types', []))) checked @endif>
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
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crea il tuo ristorante') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
