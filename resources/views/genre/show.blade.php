@extends('layouts.myapp')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Добавлен</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $genre->id }}</td>
                <td>{{ $genre->title }}</td>
                <td>{{ (new DateTime($genre->created_at))->format('d-m-Y')}}</td>
            </tr>
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route("genre.edit", $genre->id) }}">Изменить</a>
        <form action="{{ route("genre.destroy", $genre->id) }}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type="submit" value="Удалить">
        </form>
    </div>

@endsection
