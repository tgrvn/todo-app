<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(2, true),
            'descriptrion' =>  rand(0,1) ? fake()->sentence(12) : null,
            'expired_at' => rand(0,1) ? fake()->dateTimeBetween('-1 year') : null
        ];
    }
}
