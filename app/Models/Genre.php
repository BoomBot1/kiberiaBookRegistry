<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends BaseModel
{
    use HasFactory;

    protected $table = 'genres';
    protected $guarded = [];
    protected $hidden = [
        'created_at',
    ];
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_genres','genre_id', 'book_id');
    }
}
