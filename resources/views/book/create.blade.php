@extends('layouts.myapp')
@section('content')
    <div class="container">
        <div class="align-items-center">
            <form action="{{ route('book.store') }}" method="post">
                @csrf
                <div class="input-group mb-sm-1">
                    <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                    <input type="text" name="title" class="form-control" maxlength="255" required>
                </div>
                <div class="input-group mb-sm-1">
                    <span class="input-group-text"> Автор</span>
                    <select class="form-select" name="author_id">
                        @foreach($authors as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                Жанры:
                @foreach($genres as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="genres[]" value="{{ $item->id }}"
                               id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $item -> title }}
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
                <button type="submit" class="btn btn-primary">Создать</button>
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
