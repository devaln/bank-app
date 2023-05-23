<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartmentTableSeeder::class,
            AccountTypeTableSeeder::class,
            UserTableSeeder::class,
            // CustomerTableSeeder::class,
            NomineeTableSeeder::class,
            // EmployeeTableSeeder::class,
            AddressTableSeeder::class,
            CardTableSeeder::class,
            ParticularTableSeeder::class,
            SalaryTableSeeder::class,
        ]);
    }
}
