@extends('layouts.myapp')
@section('content')
    <div class="container">
        <h6 class="display-6">Авторы</h6>
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
            @foreach($authors as $item)
                <tr>
                    <td>
                        <a href="{{ route('author.show', $item->id) }}"
                           class="link-info link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                            {{ $item->id }}
                        </a>
                    </td>
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        {{ count($item->books) }}
                    </td>
                    <td>
                        {{ (new DateTime($item->created_at))->format('d-m-Y') }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        {{ $authors->links() }}
    </div>
@endsection
