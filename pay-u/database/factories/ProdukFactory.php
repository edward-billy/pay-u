<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\produk;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    protected $model = produk::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
            'stok' => $this->faker->randomDigit,
            'harga' => $this->faker->randomFloat(2, 10, 100),
            'kategoriId' => function () {
                return \App\Models\kategori::factory()->create()->id;
            }
        ];
    }
}
