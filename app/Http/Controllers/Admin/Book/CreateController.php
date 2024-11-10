<?php

namespace App\Http\Controllers\Admin\Book;
use App\Http\Requests\Book\CreateRequest;
use App\Models\Author;
use App\Models\Genre;

class CreateController extends BaseController
{

    public function __invoke()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.create', compact(['authors', 'genres']));
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();


        return $this->service->store($data);


    }

}
