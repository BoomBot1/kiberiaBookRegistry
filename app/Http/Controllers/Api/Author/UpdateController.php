<?php

namespace App\Http\Controllers\Api\Author;



use App\Http\Requests\Api\Author\ApiUpdateRequest;



class UpdateController extends BaseController
{
    public function __invoke(string $id, ApiUpdateRequest $request)
    {
        return $this->service->update($id, $request);

    }

}
