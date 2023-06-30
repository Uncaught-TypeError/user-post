<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
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
            'user_id' => rand(1,5),
            'category_id' => rand(1,5),
            'title' => fake()->sentence(5),
            'brand' => fake()->sentence(3),
            'description' => fake()->sentence(30),
            'is_feature' => rand(0,1),
        ];
    }
}
