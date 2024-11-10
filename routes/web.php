<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Book;
use App\Http\Controllers\Admin\Genre;
use App\Http\Controllers\Admin\Author;

Route::get('/', function ()
{
    return redirect()->route('web.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(\App\Http\Middleware\AdminPanelMiddleware::class)->prefix('admin')->group(function (){
    Route::get('books', [Book\IndexController::class, '__invoke'])->name('book.index');
    Route::get('books/create', [Book\CreateController::class, '__invoke'])->name('book.create');
    Route::post('books', [Book\CreateController::class, 'store'])->name('book.store');
    Route::get('books/{book}', [Book\ShowController::class, '__invoke'])->name('book.show');
    Route::get('books/{book}/edit', [Book\UpdateController::class, '__invoke'])->name('book.edit');
    Route::put('books/{book}', [Book\UpdateController::class, 'update'])->name('book.update');
    Route::delete('books/{book}', [Book\DeleteController::class, '__invoke'])->name('book.destroy');


    Route::get('authors', [Author\IndexController::class, '__invoke'])->name('author.index');
    Route::get('authors/create', [Author\CreateController::class, '__invoke'])->name('author.create');
    Route::post('authors', [Author\CreateController::class, 'store'])->name('author.store');
    Route::get('authors/{author}', [Author\ShowController::class, '__invoke'])->name('author.show');
    Route::get('authors/{author}/edit', [Author\UpdateController::class, '__invoke'])->name('author.edit');
    Route::patch('authors/{author}', [Author\UpdateController::class, 'update'])->name('author.update');
    Route::delete('authors/{author}', [Author\DeleteController::class, '__invoke'])->name('author.destroy');


    Route::get('genres', [Genre\IndexController::class, '__invoke'])->name('genre.index');
    Route::get('genres/create', [Genre\CreateController::class, '__invoke'])->name('genre.create');
    Route::post('genres', [Genre\CreateController::class, 'store'])->name('genre.store');
    Route::get('genres/{genre}', [Genre\ShowController::class, '__invoke'])->name('genre.show');
    Route::get('genres/{genre}/edit', [Genre\UpdateController::class, '__invoke'])->name('genre.edit');
    Route::patch('genres/{genre}', [Genre\UpdateController::class, 'update'])->name('genre.update');
    Route::delete('genres/{genre}', [Genre\DeleteController::class, '__invoke'])->name('genre.destroy');
});



require __DIR__.'/auth.php';
