@extends('layouts.myapp')
@section('content')
    <script>
        function disableEmptyInputs(form) {
            var controls = form.elements;
            for (var i = 0, iLen = controls.length; i < iLen; i++) {
                if (controls[i].value == '') {
                    controls[i].disabled = true;
                }
            }
        }
    </script>
    <div class="container-fluid">

        <div class="row">
            <div class="col-3">
                <h6 class="display-6">Фильтры</h6>
                <form action="{{ route('book.index') }}" method="get" onsubmit="disableEmptyInputs(this)">
                    Автор
                    <select class="form-select" aria-label="author filter" name="author_id">
                        <option selected></option>
                        @foreach($authors as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    Жанр
                    <select class="form-select" aria-label="genre filter" name="genres[]">
                        <option selected></option>
                        @foreach($genres as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                    Название
                    <div class="input-group">
                        <input type="text" class="form-control" aria-label="search for title" name="title">
                    </div>
                    Сортировать
                    <select class="form-select" aria-label="sort by title" name="sorted">
                        <option selected></option>
                        <option value="1">А-Я</option>
                        <option value="2">Я-А</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-3">Применить фильтр</button>
                </form>
            </div>

            <div class="col-9">
                <h6 class="display-6">Книги</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Жанры</th>
                        <th scope="col">Добавлена</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($book as $item)
                        <tr>
                            <td>
                                <a href="{{ route('book.show', $item->id) }}"
                                   class="link-info link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                    {{ $item->id }}
                                </a>
                            </td>
                            <td>
                                {{ $item->title }}
                            </td>
                            <td>
                                @if(isset($item->author))
                                    <a href="{{ route('author.show', $item->author->id) }}"
                                       class="link-info link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        {{ $item->author->name }}</a>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        Жанры
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach($item->genres as $genre)
                                            <li><a class="dropdown-item"
                                                   href="{{ route('genre.show', $genre->id) }}">{{ $genre->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            <td>
                                {{ (new DateTime($item->created_at))->format('d-m-Y') }}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="container">
                    {{ $book->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
