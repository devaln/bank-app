<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Particular;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->numberBetween(1, Employee::count()),
            'ammount' => fake()->numerify('#####.##'),
            'status' => fake()->randomElement(['Unpaid', 'Paid', 'Pending']),
            'particular_id' => fake()->numberBetween(1, Particular::count()),
            'description' => fake()->sentence(),
        ];
    }
}
