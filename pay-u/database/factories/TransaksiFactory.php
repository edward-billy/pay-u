<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\transaksi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    public function definition()
    {
        return [
            'invoiceId' => $this->faker->unique()->randomNumber(8),
            'customerId' => \App\Models\Customer::factory()->create()->id,
            'userId' => \App\Models\User::factory()->create()->id,
            'total' => $this->faker->numberBetween(10000, 1000000),
        ];
    }

}
