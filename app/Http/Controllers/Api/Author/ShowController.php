<?php

namespace App\Http\Controllers\Api\Author;




class ShowController extends BaseController
{
    public function __invoke(string $id)
    {
        return $this->service->show($id);

    }

}
