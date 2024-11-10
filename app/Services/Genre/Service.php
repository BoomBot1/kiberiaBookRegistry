<?php

namespace App\Services\Genre;

use App\Models\Genre;

class Service
{
    public function store($data)
    {
        $genre = Genre::firstOrCreate($data, $data + ['created_at' => now()]);
        if ($genre->wasRecentlyCreated=='true')
        {
            return view('genre.store', compact('data'));
        }
        return view('genre.storeFail', compact('genre'));
    }

}
