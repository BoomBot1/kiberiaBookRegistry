@extends('layouts.myapp')
@section('content')
    <div class="container">
        <div class="align-items-center">
            <form action="{{ route('genre.store') }}" method="post">
                @csrf
                <div class="input-group mb-sm-1">
                    <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                    <input type="text" name="title" class="form-control" aria-label="name input"
                           aria-describedby="inputGroup-sizing-default" maxlength="255" required>

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
