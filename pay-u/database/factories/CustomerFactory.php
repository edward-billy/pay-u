<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'noHp' => $this->faker->phoneNumber,
        ];
    }
}
