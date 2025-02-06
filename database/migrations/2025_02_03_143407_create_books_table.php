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
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->unsignedInteger('pages')->default(10);
            $table->timestamps();


            $table->softDeletes();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->index('category_id', 'book_category_idx');
            $table->foreign('category_id', 'book_category_fk')->references('id')->on('categories');
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
