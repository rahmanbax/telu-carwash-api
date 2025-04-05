<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // tabel users
        DB::table('users')->insert([
            [
                'username' => 'johndoe',
                'password' => Hash::make('password123'),
                'nama' => 'John Doe',
                'no_handphone' => '81234567890',
                'email' => 'superadmin@example.com',
                'status_user' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // admin role
        DB::table('admin_role')->insert([
            ['nama_role' => 'Superadmin', 'created_at' => now(), 'updated_at' => now()],
            ['nama_role' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // admin
        DB::table('admins')->insert([
            [
                'username' => 'superadmin',
                'password' => Hash::make('password123'),
                'nama' => 'Rahman Super',
                'no_handphone' => '81234567890',
                'email' => 'superadmin@example.com',
                'id_admin_role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'adminhrd',
                'password' => Hash::make('password123'),
                'nama' => 'Rahman HRD',
                'no_handphone' => '81234567891',
                'email' => 'adminhrd@example.com',
                'id_admin_role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Layanan Transaksi
        DB::table('layanan_transaksi')->insert([
            [
                'id_layanan_transaksi' => 1,
                'nama_layanan' => 'Cuci Mobil Premium',
                'harga' => 15000,
                'deskripsi' => 'Paket cuci mobil lengkap dengan poles',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Kendaraan
        DB::table('kendaraan')->insert([
            [
                'no_plat' => 'D1234ABC',
                'jenis_kendaraan' => 'motor',
                'model_kendaraan' => 'Mio M3',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_plat' => 'D1234ABC',
                'jenis_kendaraan' => 'mobil',
                'model_kendaraan' => 'Avanza 2020',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Status Transaksi
        DB::table('status_transaksi')->insert([
            ['id_status_transaksi' => 1, 'nama_status_transaksi' => 'Booking', 'created_at' => now(), 'updated_at' => now()],
            ['id_status_transaksi' => 2, 'nama_status_transaksi' => 'Belum Dicuci', 'created_at' => now(), 'updated_at' => now()],
            ['id_status_transaksi' => 3, 'nama_status_transaksi' => 'Sedang Dicuci', 'created_at' => now(), 'updated_at' => now()],
            ['id_status_transaksi' => 4, 'nama_status_transaksi' => 'Selesai', 'created_at' => now(), 'updated_at' => now()],
            ['id_status_transaksi' => 5, 'nama_status_transaksi' => 'Expired', 'created_at' => now(), 'updated_at' => now()],
            ['id_status_transaksi' => 6, 'nama_status_transaksi' => 'Dibatalkan', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Transaksi
        DB::table('transaksi')->insert([
            [
                'id_transaksi' => 1,
                'id_user' => 1,
                'id_admin' => 1,
                'id_kendaraan' => 1,
                'id_layanan_transaksi' => 1,
                'id_status_transaksi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Booking
        DB::table('booking')->insert([
            [
                'id_booking' => 1,
                'id_transaksi' => 1,
                'id_user' => 1,
                'tanggal_booking' => now()->addDay(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
