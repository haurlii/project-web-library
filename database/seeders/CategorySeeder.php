<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create(['name' => $category = 'Fiksi', 'slug' => Str::slug($category)]);
        Category::factory()->create(['name' => $category = 'Non Fiksi', 'slug' => Str::slug($category)]);
        Category::factory()->create(['name' => $category = 'Biografi', 'slug' => Str::slug($category)]);
        Category::factory()->create(['name' => $category = 'Sejarah', 'slug' => Str::slug($category)]);
        Category::factory()->create(['name' => $category = 'Teknologi', 'slug' => Str::slug($category)]);
        Category::factory()->create(['name' => $category = 'Kesehatan', 'slug' => Str::slug($category)]);
        Category::factory()->create(['name' => $category = 'Bisnis', 'slug' => Str::slug($category)]);
        Category::factory()->create(['name' => $category = 'Psikologi', 'slug' => Str::slug($category)]);
        Category::factory()->create(['name' => $category = 'Pendidikan', 'slug' => Str::slug($category)]);
        Category::factory()->create(['name' => $category = 'Sastra', 'slug' => Str::slug($category)]);
    }
}
