@extends('layouts.app')

    @push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#stockTable').DataTable();
            $(".datatable").on("click", ".btn-delete", function(e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Are you sure want to delete\n" + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
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
                            <h1 class="h3 mb-0 text-gray-800">Stock Barang</h1>
                            <ul class="list-inline mb-0 float-end">
                                <li class="list-inline-item">
                                    <a href="{{ route('stock.exportPdf') }}"
                                        class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> Download PDF</a>
                                    <a href="{{ route('stock.exportExcel') }}"
                                        class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> Download Excel</a>
                                </li>
                            </ul>
                        </div>
                        <div class="container-fluid pt-2 px-2">
                            <div class="bg-white justify-content-between rounded shadow p-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle table-hover table-striped mb-0 datatable"
                                        id="stockTable" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama</th>
                                                <th>Jenis</th>
                                                <th>Merk</th>
                                                <th>Stock</th>
                                                <th>Satuan</th>
                                                <th>Lokasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stock as $index => $stock)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        @if ($stock->gambar)
                                                            <img src="{{ asset('storage/' . $stock->gambar) }}"
                                                                alt="{{ $stock->nama }}" style="width: 50px; height: 50px;">
                                                        @else
                                                            <span>Tidak ada gambar</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $stock->nama }}</td>
                                                    <td>{{ $stock->jenis }}</td>
                                                    <td>{{ $stock->merk }}</td>
                                                    <td>{{ $stock->stock }}</td>
                                                    <td>{{ $stock->satuan }}</td>
                                                    <td>{{ $stock->lokasi }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!-- Tombol Edit -->
                                                            <button type="button" class="btn btn-success btn-sm me-2"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editBarangModal{{ $stock->id }}">
                                                                <i class="fas fa-pencil-alt"></i> Edit
                                                            </button>
                                                            <!-- Tombol Delete -->
                                                            <form
                                                                action="{{ route('stock.destroy', ['stock' => $stock->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm me-2 btn-delete"
                                                                    data-name="{{ $stock->nama }}">
                                                                    <i class="fas fa-trash"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
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
