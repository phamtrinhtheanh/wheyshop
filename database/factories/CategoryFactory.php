<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'slug' => fake()->unique()->safeColorName(),
            'status' => random_int(0, 1),
            'meta_title' => fake()->sentence(),
            'meta_description' => fake()->paragraph(),
            'meta_keywords' => fake()->word(),
            'created_by' => User::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
