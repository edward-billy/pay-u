<?php

namespace Database\Factories;

use App\Models\transaksiDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiDetailFactory extends Factory
{
    protected $model = transaksiDetail::class;

    public function definition()
    {
        return [
            'transaksiId' => rand(1, 10),
            'produkId' => rand(1, 50),
            'jumlah' => rand(1, 10),
            'harga' => rand(10000, 100000),
        ];
    }
}
