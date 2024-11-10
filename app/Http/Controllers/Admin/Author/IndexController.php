<?php

namespace App\Http\Controllers\Admin\Author;


use App\Models\Author;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $authors = Author::paginate(15);
        return view('author.index', compact('authors'));
    }

}
