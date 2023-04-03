<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        Kategori::factory()->count(10)->create();
    }
}
