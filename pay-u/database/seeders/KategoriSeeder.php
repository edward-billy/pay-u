<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategori = new kategori;
        $kategori->nama = 'Makanan';
        $kategori->deskripsi = 'Kategori yang bisa dimakan';
        $kategori->save();

        $kategori = new kategori;
        $kategori->nama = 'Minuman';
        $kategori->deskripsi = 'Kategori yang bisa diminum';
        $kategori->save();

        $kategori = new kategori;
        $kategori->nama = 'Kecantikan';
        $kategori->deskripsi = 'Kategori yang biasa digunakan untuk merawat diri';
        $kategori->save();
    }
}
