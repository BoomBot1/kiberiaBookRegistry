<?php

namespace App\Http\Controllers\Api\Book;



use App\Models\Book;


class ShowController extends BaseController
{
    public function __invoke(string $id)
    {
        $book = Book::find($id);
        if (!$book)
        {
            return reponse("Not Found", 404);
        }

        return $book;

    }

}
