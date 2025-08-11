<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publisher>
 */
class PublisherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company = fake()->company();
        return [
            'name' => $company,
            'slug' => Str::slug($company),
            'address' => fake()->address(),
            'email' => fake()->companyEmail(),
            'contact' => fake()->phoneNumber(),
        ];
    }
}
