@extends('layouts.myapp')
@section('content')
    <div class="container">
        <h1 class="display-2">Жанр {{$data['title']}} добавлен</h1>
    </div>

    <div class="container">
        <div class="btn-group">
            <a class="btn btn-info" href="{{ route('genre.index') }}">OK</a>
        </div>
    </div>
@endsection
