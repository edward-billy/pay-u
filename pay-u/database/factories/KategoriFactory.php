<?php

namespace Database\Factories;

use App\Models\kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    protected $model = Kategori::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
        ];
    }

}
