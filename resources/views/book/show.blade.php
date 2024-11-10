@extends('layouts.myapp')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Автор</th>
                <th scope="col">Название</th>
                <th scope="col">Жанры</th>
                <th scope="col">Издание</th>
                <th scope="col">Добавлена</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    {{ $book->id }}
                </td>
                <td>
                    <a href="{{ route('author.show', $book->author->id) }}" class="link-info link-underline link-underline-opacity-0 link-underline-opacity-100-hover">{{ $book->author->name }}</a>
                </td>
                <td>
                    {{ $book->title }}
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Жанры
                        </button>
                        <ul class="dropdown-menu">
                            @foreach($genres as $genre)
                                <li>
                                    <a class="dropdown-item" href="{{ route('genre.show', $genre->id) }}">{{ $genre->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </td>
                <td>
                    {{ $book->editionToString($book->edition) }}

                </td>
                <td>
                    {{ (new DateTime($book->created_at))->format('d-m-Y')}}
                </td>
            </tr>

            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route("book.edit", $book->id) }}">Изменить</a>
        <form action="{{ route("book.destroy", $book->id) }}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type="submit" value="Удалить">
        </form>
    </div>

@endsection
