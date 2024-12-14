@extends('layouts.app')

@push('scripts')
<script type="module">
    $(document).ready(function() {
        $('#beliBarangTable').DataTable();
        
        // Konfirmasi delete dengan SweetAlert
        $(".datatable").on("click", ".btn-delete", function(e) {
            e.preventDefault();

            var form = $(this).closest("form");
            var name = $(this).data("name");

            Swal.fire({
                title: "Yakin ingin menghapus\n" + name + "?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: "bg-primary",
                confirmButtonText: "Ya, hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush

@section('content')
@include('layouts.navbar')
<div id="layoutSidenav">
    @include('layouts.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Daftar Pembelian Barang</h1>
                    <a href="{{ route('beli_barang.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pembelian
                    </a>
                </div>
                <div class="container-fluid pt-2 px-2">
                    <div class="bg-white justify-content-between rounded shadow p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle table-hover table-striped mb-0 datatable" id="beliBarangTable" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Proyek</th>
                                        <th>Alamat Proyek</th>
                                        <th>Jenis Proyek</th>
                                        <th>Kategori Proyek</th>
                                        <th>PIC Lapangan</th>
                                        <th>Kontak PIC</th>
                                        <th>Detail Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($beliBarang as $pembelian)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pembelian->nama_proyek }}</td>
                                            <td>{{ $pembelian->alamat_proyek }}</td>
                                            <td>{{ $pembelian->jenis_proyek }}</td>
                                            <td>{{ $pembelian->kategori_proyek }}</td>
                                            <td>{{ $pembelian->pic_lapangan }}</td>
                                            <td>{{ $pembelian->kontak_pic }}</td>
                                            <td>
                                                <ul>
                                                    @foreach($pembelian->barangDibeli as $barang)
                                                        <li>{{ $barang->nama }} ({{ $barang->pivot->jumlah }} {{ $barang->satuan }})</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('beli_barang.edit', $pembelian->id) }}" class="btn btn-sm btn-warning me-2">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                    <form action="{{ route('beli_barang.destroy', $pembelian->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger btn-delete" data-name="{{ $pembelian->nama_proyek }}">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Belum ada data pembelian barang.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
