<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Letter>
 */
class LetterFactory extends Factory
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
            'text' => fake()->realText(300, 3),
            'company' => fake()->company(),
            'contract_type' => fake()->creditCardType(),
            'localization' => fake()->city(),
            'experience' => fake()->randomDigitNotNull(),
            'skills' => json_encode(fake()->text()),
            'user_id' => 1,
            'appellation_id' => fake()->randomDigitNotNull()
        ];
    }
}
