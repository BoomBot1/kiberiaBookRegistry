<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class BookFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const AUTHOR_ID = 'author_id';
    public const GENRES = 'genres';
    public const SORTED = 'sorted';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::AUTHOR_ID => [$this, 'author_id'],
            self::SORTED => [$this, 'sorted'],
            self::GENRES => [$this, 'genres']
        ];
    }

    public function title(Builder  $builder, $value)
    {
            $builder->where("title", 'like', "%{$value}%");
    }

    public function genres(Builder $builder, $value)
    {
            $builder->join('book_genres', 'book_genres.book_id', '=', 'books.id')->where('genre_id', $value);
    }

    public function author_id(Builder $builder, $value)
    {
            $builder->where('author_id', '=', $value);
    }

    public function sorted(Builder  $builder, $value)
    {
        if($value == '1'){
            $builder->orderBy('title');
        }
        else if($value == '2')
        {
            $builder->orderByDesc('title');
        }

    }


}
