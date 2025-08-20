<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use App\Enums\BookStatus;
use App\Models\Publisher;
use App\Enums\BookLanguage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'book_code'        => 'BK-' . strtoupper(Str::random(9)),
            'title'            => $title,
            'slug'             => Str::slug($title) . '-' . strtolower(Str::random(4)),
            'isbn'             => $this->faker->isbn13(),
            'publication_year' => $this->faker->year(),
            'language'         => BookLanguage::INDONESIA->value,
            'synopsis'         => $this->faker->sentence(30),
            'number_of_pages'  => $this->faker->numberBetween(50, 500),
            'status'           => BookStatus::AVAILABLE->value,
            'price'            => $this->faker->numberBetween(50000, 250000),

            // relasi id (acak dari table terkait)
            'author_id'        => Author::factory(),
            'publisher_id'     => Publisher::factory(),
            'category_id'      => Category::factory(),
        ];
    }
}
