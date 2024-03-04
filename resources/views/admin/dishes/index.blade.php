@extends('layouts.admin')
@section('content')
    @if (session('message'))
        <div class="alert alert-warning" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <ul>

        @foreach ($dishes as $dish)
            <li>{{ $dish->name }}
                <a href="{{ route('admin.dishes.edit', $dish) }}">modifica</a>

                {{-- Delete --}}
                <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Cancella" class="btn btn-danger">
                </form>
            </li>
        @endforeach
    </ul>
@endsection
