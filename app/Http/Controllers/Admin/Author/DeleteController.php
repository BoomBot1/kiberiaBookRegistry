<?php

namespace App\Http\Controllers\Admin\Author;


use App\Models\Author;

class DeleteController extends BaseController
{

    public function __invoke(Author $author)
    {
        $this->service->delete($author);

        return redirect()->route('author.index');
    }

}
