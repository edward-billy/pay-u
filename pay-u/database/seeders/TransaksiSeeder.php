<?php

namespace Database\Seeders;

use App\Models\transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        transaksi::factory()->count(50)->create();
    }
}
