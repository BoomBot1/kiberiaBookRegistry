<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends BaseModel
{
    use SoftDeletes, HasFactory, Filterable;
    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
        'pivot'
    ];

    public static $edition = [
        'printed' =>'Печатное',
        'graphic' => 'Графическое',
        'digital' => 'Цифровое',
    ];



    public function editionToString($curr)
    {

        return self::$edition[$curr];

    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres', 'book_id', 'genre_id');
    }
}
