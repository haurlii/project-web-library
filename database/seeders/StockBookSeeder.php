<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\StockBook;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StockBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // StockBook::factory()->recycle([
        //     Book::all(),
        // ])->create();
    }
}
