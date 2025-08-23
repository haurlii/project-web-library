<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // copy dari sini
        Publisher::create([
            'id' => 1,
            'name' => $name = 'nama penerbit',
            'slug' => Str::of(Str::slug($name) . '-' . Str::random(5))->lower(), // jangan diubah
            'address' => 'alamat penerbit',
            'email' => 'email@penerbit1.com',
            'contact' => '08123456789',
        ]);
        // sampe sini

        // Publisher::factory(20)->create();
    }
}
