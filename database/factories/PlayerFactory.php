<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
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
            'level' => fake()->numberBetween(1, 5),
            'email' => fake()->unique()->safeEmail(),
            'flg_goalkeeper' => fake()->numberBetween(0, 1)
        ];
    }
}
