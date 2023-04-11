<?php

namespace Database\Factories;

use App\Models\transaksiDetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\produk;
use App\Models\kategori;

class TransaksiDetailFactory extends Factory
{
    protected $model = transaksiDetail::class;

    public function definition()
    {
        $transaksiIds = \App\Models\transaksi::pluck('id')->toArray();
        $produkIds = \App\Models\produk::pluck('id')->toArray();
        return [
            'transaksiId' =>  $this->faker->randomElement($transaksiIds),
            'produkId' => $this->faker->randomElement($produkIds),
            'jumlah' => rand(1, 10),
            'harga' => rand(10000, 100000),
        ];
    }
}
