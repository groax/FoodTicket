<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::whereNot('is_admin', true)->inRandomOrder()->first()->id,
            'address' => fake()->address(),
            'is_paid' => fake()->boolean(),
            'is_delivered' => fake()->boolean(),
        ];
    }
}
