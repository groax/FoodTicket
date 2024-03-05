<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word('en', 'nl'),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 1, 30),
            'image' => Storage::disk('public')->putFile('articles', fake()->image()),
        ];
    }
}
