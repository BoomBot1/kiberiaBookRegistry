<?php

namespace App\Services\Api\Book;


use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Log;


class Service
{
    private array $oldGenresArray = [];

    public function index($request)
    {
        $request = $request->validated();
        $books = Book::query();
        $books->join('authors', 'books.author_id', '=', 'authors.id');

        if (!isset($request['paginate']))
        {
            $request['paginate'] = 15;
        }

        $books->Paginate($request['paginate']);

        if (isset($request['page']))
        {
            $books->offset($request['paginate'] * ($request['page'] - 1));
        }

        return $books->select('books.id', 'title', 'name')->get();

    }

    public function update($data, $id)
    {
        $data = $data->validated();
        $genres = BookGenre::where('book_id', $id)->get();
        $book = Book::find($id);
        $token = auth()->user()->tokens[0];

        if (!($token['abilities'] == ["user:{$book->author->user_id}"]))
        {
            return response('Access denied', 403);
        }

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
        return response("Successful", 200);
    }

    public function log(Book $oldBookModel, array $data, $oldGenres):array
    {


        $message = '';
        $newDataForBook = [];

        # я нагрузил этот метод доп отвественность(знаю что так нехорошо, но это палка о двух концах) чтобы не копипастить эти условные конструкции
        # переменная newDataForBook нужна чтобы разгрузить метод update() и не передавать туда лишние ключи
        if (isset($data['genres']))
        {
            if($this->getDiffGenres($oldGenres, $data['genres']))
            {
                $message .= 'genres: ' . implode(',', $this->oldGenresArray) . '->' . implode(',', $data['genres']) . ";\n";
            }
        }

        if (isset($data['title']))
        {
            if ($oldBookModel->title !== $data['title'])
            {
                $message .= "title: $oldBookModel->title -> {$data['title']};\n";
                $newDataForBook['title'] = $data['title'];
            }

        }

        if (isset($data['edition']))
        {
            if ($oldBookModel->edition !== $data['edition'])
            {
                $message .= "edition: $oldBookModel->edition -> {$data['edition']};\n";
                $newDataForBook['edition'] = $data['edition'];

            }
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
