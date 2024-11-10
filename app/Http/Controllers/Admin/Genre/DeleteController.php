<?php

namespace App\Http\Controllers\Admin\Genre;


use App\Models\Genre;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{

    public function __invoke(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genre.index');
    }

}
