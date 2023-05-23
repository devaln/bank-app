<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountType>
 */
class AccountTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['Salary', 'Zero-balance', 'Zero-salarried', 'Business']),
            'loan_intrest_rate' => fake()->numerify('####.##'),
            'saving_intrest_rate' => fake()->numerify('####.##'),
        ];
    }
}
