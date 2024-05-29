<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'subcategory_id' => SubCategory::inRandomOrder()->first()->id,
            'slug' => fake()->unique()->word(),
            'brand_id' => 0,
            'old_price' => fake()->numberBetween(0, 1000),
            'price' => fake()->numberBetween(0, 1000),
            'short_decription' => fake()->sentence(),
            'decription' => fake()->sentence(),
            'add_info' => fake()->sentence(),
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
