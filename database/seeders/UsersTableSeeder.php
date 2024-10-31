<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'adminuser', // Ganti dengan username admin yang diinginkan
            'nickname' => 'Admin',     // Ganti dengan nama panggilan admin yang diinginkan
            'email' => 'admin1@gmail.com', // Ganti dengan email admin yang diinginkan
            'password' => Hash::make('admin'), // Ganti dengan password yang diinginkan
            'role' => 'admin', // Peran admin
        ]);
    }
}
