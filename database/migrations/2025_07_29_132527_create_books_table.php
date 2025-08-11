<?php

use App\Enums\BookStatus;
use App\Enums\BookLanguage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_code');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('publication_year')->unsigned()->nullable()->default(0);
            $table->string('isbn')->nullable();
            $table->string('language')->default(BookLanguage::INDONESIA->value);
            $table->text('synopsis')->nullable();
            $table->integer('number_of_pages')->unsigned()->nullable()->default(0);
            $table->string('status')->default(BookStatus::AVAILABLE->value);
            $table->string('cover')->nullable();
            $table->integer('price')->unsigned()->nullable()->default(0);
            $table->foreignId('author_id')->constrained('authors')->cascadeOnDelete();
            $table->foreignId('publisher_id')->constrained('publishers')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->timestamps();
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
