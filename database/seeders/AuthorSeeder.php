<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // copy dari sini
        Author::create([
            'id' => 1,
            'name' => $name = 'Nama Penulis',
            'slug' => Str::of(Str::slug($name) . '-' . Str::random(5))->lower(),
        ]);
        // sampe sini

        // Author::factory(10)->create();
    }
}
