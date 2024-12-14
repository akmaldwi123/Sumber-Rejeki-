<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'jumlah',
        'tujuan',
        'status',
        'user_id',
    ];

    /**
     * Relasi ke model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
