<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeliBarang extends Model
{
    use HasFactory;

    protected $table = 'beli_barang';  // Tentukan nama tabel secara eksplisit

    protected $fillable = [
        'nama_proyek', 'alamat_proyek', 'jenis_proyek', 'kategori_proyek', 'pic_lapangan', 'kontak_pic'
    ];

    public function barangDibeli()
    {
        // Ganti 'pivot_table_name' dengan nama tabel pivot yang benar
        return $this->belongsToMany(StokBarang::class, 'beli_barang_stok_barang')
                    ->withPivot('jumlah');
    }
}
