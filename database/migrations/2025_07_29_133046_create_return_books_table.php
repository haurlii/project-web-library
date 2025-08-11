<?php

use App\Enums\ReturnBookStatus;
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
        Schema::create('return_books', function (Blueprint $table) {
            $table->id();
            $table->string('return_code')->unique();
            $table->foreignId('loan_id')->constrained('loan_books')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('book_id')->constrained('books')->cascadeOnDelete();
            $table->date('return_date');
            $table->string('status')->default(ReturnBookStatus::CHECKED->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_books');
    }
};
