@extends('layouts.myapp')
@section('content')
    <div class="container">
        <div class="align-items-center">
            <form action="{{ route('author.store') }}" method="post">
                @csrf
                <div class="input-group mb-sm-1">
                    <span class="input-group-text">Имя</span>
                    <input type="text" name="name" class="form-control" maxlength="255" required>
                </div>
                <div class="input-group mb-sm-1">
                    <span class="input-group-text">User id</span>
                    <input type="text" name="user_id" class="form-control" value="0" maxlength="255">
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
