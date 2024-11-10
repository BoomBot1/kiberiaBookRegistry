<?php

namespace App\Services\Api\Genre;

use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Genre;
use App\Http\Requests\Api\Genre\ApiIndexRequest;



class Service
{
    public function index(ApiIndexRequest $request)
    {
        $request = $request->validated();

        $genres = Genre::query();

        if (isset($request['page'])) {
            $genres->offset($request['paginate'] * ($request['page'] - 1));
        }

        if (!isset($request['paginate'])) {
            $request['paginate'] = 5;
        }
        $genres->paginate($request['paginate']);



        $responseArray = [];
        $genres = $genres->get();
        foreach ($genres as $genre)
        {
            array_push($responseArray, $genre->attributesToArray() + ['books' => $genre->books->makeHidden(['edition','author_id', 'created_at'])]);
        }

        return $responseArray;
    }
}
