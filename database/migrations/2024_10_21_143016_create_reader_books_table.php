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
        Schema::create('reader_books', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reader_id')
                ->references('id')
                ->on('readers')
                ->onDelete('cascade');


            $table->foreignId('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reader_books');
    }
};
