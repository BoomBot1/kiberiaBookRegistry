<?php

namespace App\Http\Controllers\Admin\Book;

use App\Models\Book;

class ShowController extends BaseController
{
    public function __invoke(Book $book)
    {
        $genres = $book->genres;
        return view('book.show', compact(['book', 'genres']));
    }

}
