<?php

namespace Database\Factories;

use App\Models\Accounts;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id' => fake()->numberBetween('1', Department::count()),
            'account_id' => Accounts::factory()->create()->id,
            // 'account_id' => Accounts::factory()->create()->id,
            'education' => fake()->randomElement(['MSC', 'BSC', 'PHD']) ,
            'date_of_joining' => fake()->date('y-m-d') ,
            'work_status' => '1' ,
            'designation' => fake()->word() ,
            'official_email' => fake()->unique()->firstName().'@bankapi.com' ,
            'salary_ammount' => fake()->numerify("#####.##") ,
        ];
    }
}
