<?php

namespace App\Http\Controllers\Admin\Author;



use App\Http\Requests\Author\CreateRequest;
use App\Models\Author;
use App\Models\User;

class CreateController extends BaseController
{

    public function __invoke()
    {
        return view('author.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();

        if (User::find($data['user_id']) == null)
        {
            unset($data['user_id']);
        }
        return $this->service->store($data);

    }
}
