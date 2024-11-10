<?php

namespace App\Http\Controllers\Api\Genre;


use App\Http\Controllers\Api\Genre\BaseController;
use App\Http\Requests\Api\Genre\ApiIndexRequest;


class IndexController extends BaseController
{
    public function __invoke(?ApiIndexRequest $request)
    {
        return $this->service->index($request);

    }

}
