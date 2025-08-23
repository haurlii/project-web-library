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
        // tinggal ganti nama kategorinya sama tambah nama kategorinya
        Category::create([
            'id' => 1,
            'name' => $category = 'Fiksi',
            'slug' => Str::slug($category)
        ]);
        Category::create([
            'id' => 2,
            'name' => $category = 'Non Fiksi',
            'slug' => Str::slug($category)
        ]);
        Category::create([
            'id' => 3,
            'name' => $category = 'Biografi',
            'slug' => Str::slug($category)
        ]);
        Category::create([
            'id' => 4,
            'name' => $category = 'Sejarah',
            'slug' => Str::slug($category)
        ]);
        Category::create([
            'id' => 5,
            'name' => $category = 'Teknologi',
            'slug' => Str::slug($category)
        ]);
        Category::create([
            'id' => 6,
            'name' => $category = 'Kesehatan',
            'slug' => Str::slug($category)
        ]);
        Category::create([
            'id' => 7,
            'name' => $category = 'Bisnis',
            'slug' => Str::slug($category)
        ]);
        Category::create([
            'id' => 8,
            'name' => $category = 'Psikologi',
            'slug' => Str::slug($category)
        ]);
        Category::create([
            'id' => 9,
            'name' => $category = 'Pendidikan',
            'slug' => Str::slug($category)
        ]);
        Category::create([
            'id' => 10,
            'name' => $category = 'Sastra',
            'slug' => Str::slug($category)
        ]);
    }
}
