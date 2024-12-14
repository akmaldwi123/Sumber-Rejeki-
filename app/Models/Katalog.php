<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    protected $table = 'katalog';

    protected $fillable = [
        'proyek_id',
        'stock_barang_id',
        'jumlah',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function stockBarang()
    {
        return $this->belongsTo(StokBarang::class, 'stock_barang_id');
    }
}
