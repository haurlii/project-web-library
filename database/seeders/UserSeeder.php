<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserRole;
use App\Enums\UserGender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // copy dari sini
        User::create([
            'username' => 'username', // diambil dari NIK aja gpp
            'email' => 'email', // kalo ada kosongin dulu aja
            'firstname' => 'nama depan',
            'lastname' => 'nama belakang', // kalo cuma 1 kata tinggal hapus
            'city_of_birth' => 'tempat lahir',
            'date_of_birth' => 'tanggal lahir',
            'gender' => UserGender::FEMALE->value, // Kalo laki-laki pake UserGender::MALE->value
            'contact' => 'nomer hp atau hapus aja',
            'password' => Hash::make('password'),
        ]);
        // sampe sini

        // User::factory()->create([
        // 'username' => 'haurlii',
        // 'email' => 'haurlii@gmail.com',
        // 'firstname' => 'Haurlii',
        // 'gender' => UserGender::FEMALE->value,
        // 'password' => Hash::make('Haurlii'),
        // 'user_role' => UserRole::ADMIN->value,
        // ]);

        // User::factory(100)->create();
    }
}
