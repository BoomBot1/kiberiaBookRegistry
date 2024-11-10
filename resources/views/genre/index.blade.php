@extends('layouts.myapp')
@section('content')
    <div class="container">
        <h6 class="display-6">Жанры</h6>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Добавлен</th>
            </tr>
            </thead>
            <tbody>
            @foreach($genres as $item)
                <tr>
                    <td>
                        <a href="{{ route('genre.show', $item->id) }}"
                           class="link-info link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                            {{ $item->id }}
                        </a>
                    </td>
                    <td>
                        {{ $item->title }}
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
        {{ $genres->links() }}
    </div>
@endsection
