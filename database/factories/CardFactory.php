<?php

namespace Database\Factories;

use App\Models\Accounts;
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
        // $carddetails = $this->carddetails();
        $account = Accounts::get();

        return [
            // 'account_id' => $account->last()->id,
            'account_id' => fake()->numberBetween('1', Accounts::count()),
            'title' => fake()->word(),
            'number' => fake()->unique()->numerify('################'),
            'expiry_date' => fake()->date('y-m-d'),
            'cvv_code' => fake()->numerify('###'),
            'status' => fake()->randomElement(['Inactive', 'Active', 'Blocked', 'Deleted']),
        ];
    }

    public function carddetails()
    {
        //
    }
}
