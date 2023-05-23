<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Particular;
use App\Models\Salary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticularTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Particular::factory()->count(Employee::count())->create();
    }
}
