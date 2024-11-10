<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
use App\Models\Genre;

class UpdateController extends BaseController
{
    public function __invoke(Book $book)
    {
        $genres = Genre::all();
        return view('book.edit', compact(['book', 'genres']));
    }

    public function update(UpdateRequest $request, Book $book)
    {
        $data = $request->validated();
        $this->service->update($data, $book);


        return redirect()->route('book.show', $book->id);
    }

}
