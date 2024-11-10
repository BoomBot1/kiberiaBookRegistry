<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table='authors';
    protected $guarded=[];
    protected $hidden=[
        'deleted_at',
        'created_at',
        'user_id',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
