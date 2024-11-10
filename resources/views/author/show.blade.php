@extends('layouts.myapp')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">Количество книг</th>
                <th scope="col">Добавлен</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>
                    <a href="{{ route('book.index', ['author_id' => $author->id]) }}" class="link-info link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                    {{ count($author->books) }}
                    </a>
                </td>
                <td>{{ (new DateTime($author->created_at))->format('d-m-Y') }}</td>
            </tr>

            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route("author.edit", $author->id) }}">Изменить</a>
        <form action="{{ route("author.destroy", $author->id) }}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type="submit" value="Удалить">
        </form>
    </div>

@endsection
