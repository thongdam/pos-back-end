<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'ຜູ້ດູແລລະບົບ',
            'email' => 'admin@pos.lao',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'ພະນັກງານຂາຍ',
            'email' => 'cashier@pos.lao',
            'password' => Hash::make('cashier123'),
            'role' => 'cashier',
            'email_verified_at' => now(),
        ]);
    }
}
