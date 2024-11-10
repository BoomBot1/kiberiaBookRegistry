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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->timestamp('created_at');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->softDeletes();

            $table->index('user_id', 'user_id_idx');
            $table->foreign('user_id', 'user_id_fk')->on('users')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
