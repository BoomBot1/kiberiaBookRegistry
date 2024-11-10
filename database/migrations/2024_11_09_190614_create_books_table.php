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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->enum('edition', ['digital', 'printed', 'graphic']);
            $table->timestamp('created_at');

            $table->softDeletes();

            $table->unsignedBigInteger('author_id')->nullable();
            $table->index('author_id', 'book_author_idx');
            $table->foreign('author_id', 'book_author_fk')->on('authors')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
