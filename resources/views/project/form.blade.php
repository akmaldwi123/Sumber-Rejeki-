@extends('layouts.app')

@section('content')
    <h1>Form Pengajuan Permintaan Barang</h1>
    <form action="{{ route('project.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajukan</button>
    </form>
@endsection
