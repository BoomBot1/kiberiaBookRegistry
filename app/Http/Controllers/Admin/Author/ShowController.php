<?php

namespace App\Http\Controllers\Admin\Author;


use App\Models\Author;

class ShowController extends BaseController
{

    public function __invoke(Author $author)
    {
        return view('author.show', compact('author'));
    }

}
