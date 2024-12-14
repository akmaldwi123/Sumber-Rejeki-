<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Approval;

class ApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Approval::create([
            'nama_barang' => 'Laptop',
            'jumlah' => 2,
            'tujuan' => 'Presentasi Proyek',
            'status' => 'pending',
            'user_id' => 1, // ID user yang mengajukan
        ]);

        Approval::create([
            'nama_barang' => 'Printer',
            'jumlah' => 1,
            'tujuan' => 'Dokumentasi',
            'status' => 'pending',
            'user_id' => 2,
        ]);
    }
}
