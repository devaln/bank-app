<?php

namespace Database\Factories;

use App\Models\Accounts;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Nominee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        $addressable = $this->addressable();

        if ($addressable == Customer::class) {
            $add = Accounts::get();
        }
        else {
            $add = Nominee::get();
        }
        // dd($add->last()->id);
        return [
            'addressable_type' => $addressable,
            'addressable_id' => $add->last()->id,
            'address_text' => fake()->sentence(),
            'state' => fake()->word(),
            'district' => fake()->word(),
            'zip_code' => fake()->numerify('### ###'),
        ];
    }
    /* Relation defined */
    public function addressable()
    {
        return $this->faker->randomElement([
            Accounts::class,
            Nominee::class,
        ]);
    }
}
