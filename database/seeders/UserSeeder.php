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
        User::factory()->create([
            'username' => 'haurlii',
            'email' => 'haurlii@gmail.com',
            'firstname' => 'Haurlii',
            'gender' => UserGender::FEMALE->value,
            'password' => Hash::make('Haurlii'),
            'user_role' => UserRole::ADMIN->value,
        ]);

        User::factory(100)->create();
    }
}
