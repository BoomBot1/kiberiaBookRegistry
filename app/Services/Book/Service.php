<?php

namespace App\Services\Book;

use App\Http\Requests\Book\FilterRequest;
use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Log;

class Service
{


    private array $oldGenresArray = [];

    public function store($data)
    {
        $book = Book::firstOrCreate([
            'title' => $data['title']
        ],[
                'title' => $data['title'],
                'author_id' => $data['author_id'],
                'edition' => $data['edition'],
                'created_at' => now()
            ]);

        $author = $book->author;
        if ($book->wasRecentlyCreated=='true')
        {

            foreach ($data['genres'] as $genre_id)
            {
                BookGenre::create([
                    'book_id'=>$book->id,
                    'genre_id'=>$genre_id,
                ]);
            }

            return view('book.store', compact(['data', 'author']));
        }
        return view('book.storeFail', compact(['book', 'author']));
    }

    public function update($data, $book)
    {
        $genres = BookGenre::where('book_id', $book->id)->get();
        $newDataForBook = $this->log($book, $data, $genres);

        $book->update($newDataForBook);

        foreach ($genres as $genre)
        {
            $genre->delete();
        }

        if (isset($data['genres']))
        {
            $newGenres = $data['genres'];
            unset($data['genres']);

            foreach ($newGenres as $genre_id)
            {
                BookGenre::create([
                    'book_id' => $book->id,
                    'genre_id' => $genre_id
                ]);
            }
        }
    }

    public function log(Book $oldBookModel, array $data, $oldGenres):array
    {
        $message = '';
        $newDataForBook = [];

        # я нагрузил этот метод доп отвественность(знаю что так нехорошо, но это палка о двух концах) чтобы не копипастить эти условные конструкции
        # переменная newDataForBook нужна чтобы разгрузить метод update() и не передавать туда лишние ключи

        if($this->getDiffGenres($oldGenres, $data['genres']))
        {
            $message .= 'genres: ' . implode(',', $this->oldGenresArray) . '->' . implode(',', $data['genres']) . ";\n";
        }

        if ($oldBookModel->title !== $data['title'])
        {
            $message .= "title: $oldBookModel->title -> {$data['title']};\n";
            $newDataForBook['title'] = $data['title'];
        }

        if ($oldBookModel->edition !== $data['edition'])
        {
            $message .= "edition: $oldBookModel->edition -> {$data['edition']};\n";
            $newDataForBook['edition'] = $data['edition'];

        }

        Log::create([
            'book_id' => $oldBookModel->id,
            'note' => $message,
            'created_at' => now()
        ]);

        return $newDataForBook;
    }

    private function getDiffGenres( $oldGenresCollection, array $newGenresArray): bool
    {
        foreach ($oldGenresCollection as $genre)
        {
            array_push($this->oldGenresArray, $genre->genre_id);
        }
        return (bool)array_merge(array_diff($this->oldGenresArray, $newGenresArray), array_diff($newGenresArray, $this->oldGenresArray));


    }
}
