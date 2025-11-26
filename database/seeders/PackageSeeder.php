<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus semua data paket
        DB::table('packages')->delete();

        // Reset auto increment supaya ID mulai dari 1
        DB::statement('ALTER TABLE packages AUTO_INCREMENT = 1');

        // Insert 6 paket internet
        Package::create([
            'name' => 'Paket Hemat',
            'speed' => 10,
            'price' => 100000,
            'description' => 'Cocok untuk penggunaan dasar seperti browsing & sosial media.'
        ]);

        Package::create([
            'name' => 'Paket Rumah',
            'speed' => 20,
            'price' => 150000,
            'description' => 'Streaming lancar & meeting online tanpa gangguan.'
        ]);

        Package::create([
            'name' => 'Paket Keluarga',
            'speed' => 30,
            'price' => 180000,
            'description' => 'Bagus untuk banyak perangkat di rumah.'
        ]);

        Package::create([
            'name' => 'Paket Gaming',
            'speed' => 50,
            'price' => 250000,
            'description' => 'Ping stabil & kecepatan tinggi untuk gamer.'
        ]);

        Package::create([
            'name' => 'Paket Extreme',
            'speed' => 75,
            'price' => 350000,
            'description' => 'Untuk streaming 4K dan download super cepat.'
        ]);

        Package::create([
            'name' => 'Paket Unlimited',
            'speed' => 100,
            'price' => 500000,
            'description' => 'Paket terbaik untuk bisnis kecil & rumah besar.'
        ]);
    }
}
