<?php

namespace App\Http\Controllers\Api\Book;



use App\Models\Book;


class DeleteController extends BaseController
{
    public function __invoke(string $id)
    {
        $book = Book::find($id);
        if (!(auth()->user()->tokens[0]['abilities'] == ["user:{$book->author->user_id}"])){
            return  response('Access denied', 403);
        }
        $book->delete();
        return response('Deleted', 200);
    }

}
