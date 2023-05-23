<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Particular>
 */
class ParticularFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'card_id' => fake()->numberBetween(1, Card::count()) ,
            'ammount' => fake()->numerify('####.##'),
            'sender_id' => fake()->numberBetween(1, User::count()),
            'receiver_id' => fake()->numberBetween(1, User::count()),
            'description' => fake()->sentence(),
        ];
    }
}
