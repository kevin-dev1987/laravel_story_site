<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tag' => $this->faker->randomElement(['action', 'romance', 'short story', 'indie', 'ebook', 'travel', 'short', 'adventure', 'crime', 'guns']),
            'story_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
