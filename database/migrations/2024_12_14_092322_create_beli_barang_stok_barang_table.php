<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeliBarangStokBarangTable extends Migration
{
    public function up()
{
    Schema::create('beli_barang_stok_barang', function (Blueprint $table) {
        $table->id();
        $table->foreignId('beli_barang_id')->constrained('beli_barang')->onDelete('cascade');
        $table->foreignId('stok_barang_id')->constrained('stock_barang')->onDelete('cascade');
        $table->integer('jumlah');
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('beli_barang_stok_barang');
    }
}
