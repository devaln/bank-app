<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Nominee;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::factory()->count(User::count())->create();
        Address::factory()->count(Nominee::count())->create();
    }
}
