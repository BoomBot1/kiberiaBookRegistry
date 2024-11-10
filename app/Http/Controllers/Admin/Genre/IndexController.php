<?php

namespace App\Http\Controllers\Admin\Genre;


use App\Models\Genre;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $genres = Genre::paginate(15);
        return view('genre.index', compact('genres'));
    }

}
