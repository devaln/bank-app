<?php

namespace Database\Factories;

use App\Models\AccountType;
use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accounts>
 */
class AccountsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_type_id' => fake()->randomElement([1, 2, 3, 4]),
            'account_number' => fake()->unique()->numerify('############'),
            'account_limit' => fake()->numerify('####.##'),
            'current_balance' => fake()->numerify('50000.00'),
            'account_status' => fake()->randomElement(['Active', 'Blocked', 'Deactive']),
            // Card::factory()->create()
        ];
    }
}
