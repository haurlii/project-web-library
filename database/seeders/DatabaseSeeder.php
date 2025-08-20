<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\StockBook;
use App\Models\FineSetting;
use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AuthorSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PublisherSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([AuthorSeeder::class, PublisherSeeder::class, CategorySeeder::class, UserSeeder::class, BookSeeder::class]);
        // $this->call([UserSeeder::class]);

        FineSetting::create([
            'late_fee_per_day' => 2000,
            'damage_fee_percentage' => 25,
            'lost_fee_percentage' => 100,
        ]);

        // $this->call([]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
