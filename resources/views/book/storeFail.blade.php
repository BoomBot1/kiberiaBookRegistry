@extends('layouts.myapp')
@section('content')
    <div class="container">
        <p class="display-5">Книга с таким названием уже существует</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="p-3">
                <h3>
                    <strong>
                        Название:
                    </strong>
                    {{ $book->title }}
                </h3>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="p-3">
                <h3>
                    <strong>
                        Автор:
                    </strong>
                    {{ $author->name }}
                </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="btn-group">
            <a class="btn btn-info" href="{{ route('book.index') }}">OK</a>
        </div>
    </div>

@endsection
