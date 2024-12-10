<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang'); // Nama barang yang diajukan
            $table->integer('jumlah'); // Jumlah barang yang diajukan
            $table->string('tujuan'); // Tujuan penggunaan barang
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status approval
            $table->unsignedBigInteger('user_id'); // ID user yang mengajukan
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approvals');
    }
}
