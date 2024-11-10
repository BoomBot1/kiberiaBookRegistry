<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('genre_id');

            $table->index('book_id', 'book_id_idx');
            $table->index('genre_id', 'genre_id_idx');

            $table->foreign('book_id', 'book_id_fk')->on('books')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('genre_id', 'genre_id_fk')->on('genres')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_genres');
    }
};
