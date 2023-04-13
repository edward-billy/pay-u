<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\transaksi;
use App\Models\customer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    public function definition()
    {        
        $customerIds = \App\Models\customer::pluck('id')->toArray();
        return [
            'invoiceId' => $this->faker->unique()->randomNumber(8),
            'customerId' => $this->faker->randomElement($customerIds),
            'userId' => \App\Models\User::factory()->create()->id,
            'total' => $this->faker->numberBetween(10000, 1000000),
            'created_at' => $this->faker->dateTimeBetween('-2 year', 'now'),
        ];
    }

}
