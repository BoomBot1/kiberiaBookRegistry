@extends('layouts.myapp')
@section('content')
    <div class="container">
        <p class="display-5">Автор {{ $author->name }} уже был добавлен</p>
    </div>
    <div class="container">
        <div class="btn-group">
            <a class="btn btn-info" href="{{ route('author.index') }}">OK</a>
        </div>
    </div>

@endsection
