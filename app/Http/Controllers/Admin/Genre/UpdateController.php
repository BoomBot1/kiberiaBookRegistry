<?php

namespace App\Http\Controllers\Admin\Genre;


use App\Http\Requests\Genre\UpdateRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{

    public function __invoke(Genre $genre)
    {
        return view('genre.edit', compact('genre'));
    }

    public function update(UpdateRequest $request, Genre $genre)
    {
        $data = $request->validated();
        $genre->update($data);
        return redirect()->route('genre.show', $genre->id);
    }

}
