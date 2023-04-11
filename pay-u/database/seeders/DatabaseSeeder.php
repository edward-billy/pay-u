<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(3)->create();

        $admin = new User;
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('password');
        $admin->role = 'admin';
        $admin->save();

        $kasir = new User;
        $kasir->name = 'Kasir';
        $kasir->email = 'kasir@example.com';
        $kasir->password = bcrypt('password');
        $kasir->role = 'kasir';
        $kasir->save();

        $kasir = new User;
        $kasir->name = 'Manager';
        $kasir->email = 'manager@example.com';
        $kasir->password = bcrypt('password');
        $kasir->role = 'manager';
        $kasir->save();
        $this->call([
            KategoriSeeder::class,
            ProdukSeeder::class,
            CustomerSeeder::class,
            TransaksiSeeder::class,
            TransaksiDetailSeeder::class,
        ]);
    }
}