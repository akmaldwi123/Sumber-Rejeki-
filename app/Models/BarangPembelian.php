<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangPembelian extends Model
{
    use HasFactory;
    protected $table = 'barang_pembelian'; 

    protected $fillable = ['beli_barang_id', 'stock_barang_id', 'jumlah'];

    public function beliBarang()
    {
        return $this->belongsTo(BeliBarang::class);
    }

    public function stokBarang()
    {
        return $this->belongsTo(StokBarang::class, 'stock_barang_id');
    }
}
