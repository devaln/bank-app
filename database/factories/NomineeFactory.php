<?php

namespace Database\Factories;

use App\Models\Accounts;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nominee>
 */
class NomineeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customer = Accounts::get();
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['Male', 'Female', 'Other']),
            'relation' => fake()->randomElement(['Father', 'Mother', 'Cousin']),
            'date_of_birth' => fake()->date('y-m-d'),
            'account_id' => $customer->last()->id,
        ];
    }
}
