<?php

namespace Database\Seeders;

use App\Models\Nominee;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NomineeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nominee::factory()->count(User::count())->create();
    }
}
