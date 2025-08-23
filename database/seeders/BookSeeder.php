<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\StockBook;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // copy dari sini
        Book::create([
            'book_code' => 'BK0000001',
            'title' => $title = 'judul buku',
            'slug' => Str::of(Str::slug($title) . '-' . Str::random(5))->lower(), // jangan diubah
            'isbn' => 'isbn',
            'publication_year' => 'tahun terbit',
            'synopsis' => 'sinopsis',
            'number_of_pages' => 'jumlah halaman',
            'price' => 'harga buku',
            'author_id' => 1, // diambil dari AuthorSeeder dan yg diambil cuma id
            'publisher_id' => 1, // diambil dari PublisherSeeder dan yg diambil cuma id
            'category_id' => 1, // diambil dari CategorySeeder dan yg diambil cuma id
        ])->each(function ($book) {
            StockBook::create([
                'book_id' => $book->id,
                'total' => $total = 10, // total stock
                'available' => $total
            ]);
        });
        // sampe sini


        // Book::factory(20)->recycle([
        //     Category::all(),
        //     Author::all(),
        //     Publisher::all(),
        // ])->create()->each(function ($book) {
        //     StockBook::factory()->create([
        //         'book_id' => $book->id,
        //     ]);
        // });
    }
}
