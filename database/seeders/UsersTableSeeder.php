<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // Hapus semua data di tabel users
        DB::table('users')->truncate();

        // Masukkan data baru
        User::create([
            'username' => 'adminuser',
            'nickname' => 'Admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'manager',       // Tetap masukkan username
            'nickname' => 'Manager',       // Gunakan nickname jika 'name' tidak ada
            'password' => Hash::make('manager123'),
            'role' => 'manager',
        ]);

        User::create([
            'username' => 'staffa',         // Tetap masukkan username
            'nickname' => 'Staff A',       // Gunakan nickname
            'password' => Hash::make('staffa123'),
            'role' => 'staffa',
        ]);

        User::create([
            'username' => 'staffb',        // Tetap masukkan username
            'nickname' => 'Staff B',       // Gunakan nickname
            'password' => Hash::make('staffb123'),
            'role' => 'staffb',
        ]);

        User::create([
            'username' => 'project',        // Tetap masukkan username
            'nickname' => 'Project',       // Gunakan nickname
            'password' => Hash::make('project123'),
            'role' => 'staffb',
        ]);
    }
}
