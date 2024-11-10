@extends('layouts.myapp')
@section('content')
    <div class="container">
        <p class="display-5">Жанр {{ $genre->title }} уже был добавлен</p>
    </div>
    <div class="container">
        <div class="btn-group">
            <a class="btn btn-info" href="{{ route('genre.index') }}">OK</a>
        </div>
    </div>

@endsection
