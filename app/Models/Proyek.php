<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';

    protected $fillable = [
        'nama_proyek',
        'alamat_proyek',
        'jenis_proyek',
        'kategori',
        'pic_lapangan',
        'kontak_pic',
    ];

    public function katalog()
    {
        return $this->hasMany(Katalog::class, 'proyek_id');
    }
}
