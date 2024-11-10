<?php

namespace App\Http\Controllers\Api\Author;



use App\Http\Requests\Api\Book\ApiIndexRequest;


class IndexController extends BaseController
{
    public function __invoke(?ApiIndexRequest $request)
    {
        return $this->service->index($request);

    }

}
