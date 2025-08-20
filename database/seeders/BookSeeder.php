<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\StockBook;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory(20)->recycle([
            Category::all(),
            Author::all(),
            Publisher::all(),
        ])->create()->each(function ($book) {
            StockBook::factory()->create([
                'book_id' => $book->id,
            ]);
        });
    }
}
