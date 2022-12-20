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
    public function definition()
    {
        return [

            'title' => fake()->sentence(),
            'body' => fake()->paragraph(),
            'status' => 1,
            'comment_able' => 1,
            'video' => fake()->url(),
            'image' => fake()->imageUrl(),
            'user_id' => 1,
        ];
    }
}
