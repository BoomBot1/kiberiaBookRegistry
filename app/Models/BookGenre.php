<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookGenre extends BaseModel
{
    use HasFactory;

    protected $table = 'book_genres';
    protected $guarded = [];
}
