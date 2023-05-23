<?php

namespace Database\Seeders;

use App\Models\Accounts;
use App\Models\Card;
use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::factory()->count(Accounts::count())->create();
    }
}
