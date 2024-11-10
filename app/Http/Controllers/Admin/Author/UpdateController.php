<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Requests\Author\UpdateRequest;
use App\Models\Author;

class UpdateController extends BaseController
{
    public function __invoke(Author $author)
    {
        return view('author.edit', compact('author'));
    }

    public function update(UpdateRequest $request, Author $author)
    {
        $data = $request->validated();
        $author->update($data);

        return redirect()->route('author.show', $author->id);
    }

}
