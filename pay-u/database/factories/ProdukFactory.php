<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\produk;
use App\Models\kategori;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    protected $model = produk::class;

    public function definition()
    {
        $kategoriIds = \App\Models\kategori::pluck('id')->toArray();
    
        return [
            'nama' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
            'stok' => $this->faker->randomDigit,
            'harga' => $this->faker->numberBetween(20000, 2000000),
            'kategoriId' => $this->faker->randomElement($kategoriIds)
        ];
    }
    
}