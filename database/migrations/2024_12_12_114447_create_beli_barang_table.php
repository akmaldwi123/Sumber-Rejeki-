<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('beli_barang', function (Blueprint $table) {
                $table->id();
                $table->string('nama_proyek');
                $table->string('alamat_proyek');
                $table->string('jenis_proyek');
                $table->string('kategori_proyek');
                $table->string('pic_lapangan');
                $table->string('kontak_pic');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beli_barang');
    }
};
