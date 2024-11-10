<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Genre;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $genres = Genre::factory(5)->create();
        $users = User::factory(20)->create();
        foreach ($users as $user)
        {
            Author::create([
                'name' => $user->name,
                'created_at' => now(),
                'user_id' => $user->id,
            ]);
        }

        $admin = User::create([
            'name' => fake()->name(),
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('kiberia'),
            'admin' => true,
            'remember_token' => Str::random(20),
        ]);

        $books = Book::factory(200)->create();
        foreach($books as $book)
        {
            BookGenre::create([
                'book_id' => $book->id,
                'genre_id'=> random_int(1,4),
            ]);

        }
    }
}
