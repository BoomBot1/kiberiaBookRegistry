@extends('layouts.myapp')
@section('content')
    <div class="container">
        <div class="align-items-center">
            <form action="{{ route('book.update', $book->id) }}" method="post">
                @csrf
                @method('put')
                <div class="input-group mb-sm-1">
                    <span class="input-group-text" id="title-text-input">Название</span>
                    <input type="text" name="title" class="form-control" aria-label="Title input"
                           aria-describedby="inputGroup-sizing-default" maxlength="255" value="{{ $book->title }}">

                </div>
                <div class="input-group mb-sm-1">
                    <span class="input-group-text" id="author-text-input">Автор</span>
                    <input type="text" name="author" class="form-control" aria-label="Author input"
                           aria-describedby="inputGroup-sizing-default" maxlength="255" value="{{ $book->author->name }}" disabled readonly>
                </div>
                Жанры:

                    @foreach($genres as $genre)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="genres[]" value="{{ $genre->id }}" id="flexCheckDefault"
                            @foreach($book->genres as $bookGenre)
                                {{ $genre->id === $bookGenre->id ? ' checked' : '' }}
                            @endforeach
                            >
                            <label class="form-check-label" for="flexCheckDefault" >
                                {{ $genre->title }}
                            </label>
                        </div>
                    @endforeach
                <div class="input-group mb-sm-1">
                    <span class="input-group-text">Издание</span>
                    <label>
                        <select class="form-select" name="edition">
                            @foreach(['printed' =>'Печатное', 'graphic' => 'Графичесоке', 'digital' => 'Цифровое'] as $key => $edition)
                                <option value={{ $key }}>{{ $edition }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
