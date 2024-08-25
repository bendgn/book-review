<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => null,
            'review' => fake()->paragraph,
            'rating' => fake()->numberBetween(1, 5),
            'created_at' => fake()->dateTimeBetween('-2 years'),
            'updated_at' => fake()->dateTimeBetween('created_at', 'now')
        ];
    }

    public function average()
    {
        // generate or fake seed average review
        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(2, 5)
            ];
        });
    }

    public function bad()
    {
        // generate or fake seed bad review
        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(1, 3)
            ];
        });
    }

    public function good()
    {
        // generate or fake seed good review
        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(4, 5)
            ];
        });
    }
}
