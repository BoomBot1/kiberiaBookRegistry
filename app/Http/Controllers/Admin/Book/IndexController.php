<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Filters\BookFilter;
use App\Http\Requests\Book\FilterRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {

        $filterData = $request->validated();

        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($filterData)]);
        $book = Book::filter($filter)->paginate(15);
        $authors = Author::all();
        $genres = Genre::all();

        return view('book.index', compact(['book', 'authors', 'genres']));
    }

}
