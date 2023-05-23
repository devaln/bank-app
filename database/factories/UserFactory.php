<?php

namespace Database\Factories;

use App\Models\Accounts;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;

    public function definition(): array
    {
        $accountable = $this->accountable();
        return [
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$rYanIHSBXGGsvp.4OZCpq.UZHyY21qtRy6/0pRcmdTAwz8lBUtJkG', // password '1234567890'
            'remember_token' => Str::random(10),
            'accountable_id' => $accountable::factory(),
            'accountable_type' => $accountable,
            'avatar' => fake()->imageUrl(),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->firstNameMale(),
            'last_name' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'date_of_birth' => fake()->date('y-m-d'),
            'gender' => fake()->randomElement(['Male', 'Female', 'Other']),
            'pan_card_number' => 'CELPN' . fake()->numerify('####') . fake()->asciify('*'),
            'adhaar_card_number' => fake()->unique()->numerify('############'),
            'maritial_status' => fake()->randomElement(['Unmarried', 'Married', 'Divorced']),
        ];
    }
    /*
        Relation defined
    */
    public function accountable()
    {
        return $this->faker->randomElement([
            Accounts::class,
            Employee::class,
        ]);
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
