<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockBook>
 */
class StockBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $total = $this->faker->numberBetween(1, 20);

        return [
            'book_id'   => Book::factory(),
            'total'     => $total,
            'available' => $total, // default semua tersedia
            'loan'      => 0,
            'lost'      => 0,
            'damage'    => 0,
        ];
    }
}
