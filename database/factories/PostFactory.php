<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->unique()->sentence(20),
            'excerpt' => $this->faker->paragraph(),
            'body' => $this->faker->text(),
            'image_path' => $this->faker->imageUrl(),
            'is_published' => (($this->faker->randomDigit() & 1) == 0) ? true : false,
            'min_to_read' => $this->faker->randomDigit(),
        ];
    }
}
