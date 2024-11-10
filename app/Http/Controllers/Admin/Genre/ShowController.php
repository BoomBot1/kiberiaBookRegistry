<?php

namespace App\Http\Controllers\Admin\Genre;


use App\Models\Genre;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Genre $genre)
    {
        return view('genre.show', compact('genre'));
    }

}
