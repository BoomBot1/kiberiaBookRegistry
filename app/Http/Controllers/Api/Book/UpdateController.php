<?php

namespace App\Http\Controllers\Api\Book;


use App\Http\Requests\Api\Book\ApiUpdateRequest;


class UpdateController extends BaseController
{
    public function __invoke(string $id, ApiUpdateRequest $request)
    {
        return $this->service->update($request, $id);
    }

}
