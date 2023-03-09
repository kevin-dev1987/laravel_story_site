<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'title' => $this->faker->sentence(8),
            'description' => $this->faker->paragraph(3),
            'category' => $this->faker->randomElement([
                'Action',
                'Mystery',
                'Roamnce',
                'Horror',
                'Crime'
            ]),
            // Skip under review
            'body' => $this->faker->paragraph(10),
        ];
    }
}
