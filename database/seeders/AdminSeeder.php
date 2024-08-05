<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang diinginkan
            'alamat' => 'Alamat Admin',
            'no_hp' => '08123456789',
            'nik_ibu' => '1234567890123456',
            'nik_anak' => '6543210987654321',
            'nama_ibu' => 'Ibu Admin',
            'nama_anak' => 'Anak Admin',
            'tgl_lahir' => '1990-01-01', // Ganti dengan tanggal lahir yang diinginkan
            'usia' => '30', // Ganti dengan usia yang diinginkan
            'role' => 'admin',
            'jenis_kelamin' => 'laki_laki',
            'remember_token' => null, // Jangan ubah ini
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
