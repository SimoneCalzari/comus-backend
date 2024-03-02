@extends('layouts.admin');

@section('content')
<form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome ristorante</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Indirizzo</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone</label>
        <input type="number" class="form-control" id="phone_number" placeholder="es. 3463199771" name="phone_number">
    </div>
    <div class="mb-3">
        <label for="vat" class="form-label">VAT</label>
        <input type="number" class="form-control" id="vat" name="VAT">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="img">
    </div>
    <div class="mb-3 form-check">
        @foreach ($types as $type)
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="types">{{ $type->name_type }}</label>
                <input type="checkbox" class="form-check-input" id="types" name="types[]" value="{{ $type->id }}">
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection