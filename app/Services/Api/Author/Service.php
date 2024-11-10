<?php

namespace App\Services\Api\Author;

use App\Http\Requests\Api\Book\ApiIndexRequest;
use App\Models\Author;


class Service
{

    public function index(ApiIndexRequest $request)
    {
        $request = $request->validated();
        $authors = Author::query();

        if (!(isset($request['paginate']))) {
            $request['paginate'] = 15;

        }
        $authors->paginate($request['paginate']);


        if (isset($request['page'])) {
            $authors->forPage($request['page']);
        }
        $responseArray = [];
        foreach ($authors->get() as $author) {
            array_push($responseArray, $author->attributesToArray() + ['book_quantity' => count($author->books)]);
        }
        return $responseArray;

    }

    public function show(string $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response('Not Found', 404);
        }

        return $author->attributesToArray() + ['books' => $author->books];
    }

    public function update($id, \App\Http\Requests\Api\Author\ApiUpdateRequest $request)
    {
        $request = $request->validated();
        $author = Author::find($id);

        if (!$author)
        {
            return response('Not Found', 404);
        }
        if ((auth()->user()->tokens[0]['abilities'] != ["user:{$author->user_id}"]))
        {
            return response('Access Denied', 403);
        }

        $author->update($request);
        return response('Updated', 200);
    }

}
