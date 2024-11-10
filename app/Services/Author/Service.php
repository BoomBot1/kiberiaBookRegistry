<?php

namespace App\Services\Author;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;

class Service
{
    public function store($data)
    {

        if (isset($data['user_id']))
        {
            $author = Author::firstOrCreate($data, [
                'created_at' => now(),
                'name' => $data['name'],
                'user_id' => $data['user_id'],
            ]);
        }
        else
        {
            $author = Author::firstOrCreate($data, [
                'created_at' => now(),
                'name' => $data['name'],
            ]);
        }


        if ($author->wasRecentlyCreated == 'true') {
            return redirect()->route('author.index');
        }
        return view('author.storeFail', compact('author'));
    }

    public function delete($author)
    {
        $books = Book::where('author_id', $author->id)->get();
        foreach ($books as $book)
        {
            $book->delete();
        }
        $author->delete();
    }

}
