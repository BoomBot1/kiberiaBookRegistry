<?php

namespace App\Http\Controllers\Admin\Genre;


use App\Http\Requests\Genre\CreateRequest;
use App\Models\Genre;

use Illuminate\Http\Request;

class CreateController extends BaseController
{

    public function __invoke()
    {
        return view('genre.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        return $this->service->store($data);

    }


}
