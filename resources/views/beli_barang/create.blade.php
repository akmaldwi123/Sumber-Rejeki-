@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Form Pembelian Barang</h1>
    <form action="{{ route('beli_barang.store') }}" method="POST">
        @csrf

        <!-- Input Container (Dibagi 2 Panel) -->
        <div class="row">
            <!-- Panel Kiri -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_proyek">Nama Proyek</label>
                    <input type="text" name="nama_proyek" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="alamat_proyek">Alamat Proyek</label>
                    <textarea name="alamat_proyek" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="jenis_proyek">Jenis Proyek</label>
                    <input type="text" name="jenis_proyek" class="form-control" required>
                </div>
            </div>

            <!-- Panel Kanan -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kategori_proyek">Kategori Proyek</label>
                    <select name="kategori_proyek" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Residensial">Residensial</option>
                        <option value="Komersial">Komersial</option>
                        <option value="Industri">Industri</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pic_lapangan">PIC Lapangan</label>
                    <input type="text" name="pic_lapangan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="kontak_pic">Kontak PIC</label>
                    <input type="text" name="kontak_pic" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Bagian Katalog Barang -->
        <h4 class="mt-4">Katalog Barang</h4>
        <div class="row">
            @foreach($stokBarang as $barang)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $barang->nama }}</h5>
                            <p class="card-text">Stok: {{ $barang->stock }} {{ $barang->satuan }}</p>
                            <input type="number" name="barang[{{ $barang->id }}][jumlah]" class="form-control" min="1" max="{{ $barang->stock }}" placeholder="Jumlah" />
                            <input type="hidden" name="barang[{{ $barang->id }}][id]" value="{{ $barang->id }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tombol Submit -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Beli Barang</button>
        </div>
    </form>
</div>
@endsection
