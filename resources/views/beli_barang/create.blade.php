<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumber Rejeki Energy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    @vite(['resources/css/belibarang.css'])
</head>
<body>
    <div class="container-custom">
        <div class="header-title">
            Form Pembelian Barang
        </div>

        <form action="{{ route('beli_barang.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Left Panel -->
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
                <!-- Right Panel -->
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

            <!-- Icon Card Section -->
            <div class="row mt-4">
                @foreach($stokBarang as $barang)
                    <div class="col-md-4 mb-3">
                        <div class="icon-card">
                            <i class="fas fa-box"></i>
                            <p>{{ $barang->nama }} (Stok: {{ $barang->stock }} {{ $barang->satuan }})</p>
                            <input type="number" name="barang[{{ $barang->id }}][jumlah]" class="form-control" min="1" max="{{ $barang->stock }}" placeholder="Jumlah">
                            <input type="hidden" name="barang[{{ $barang->id }}][id]" value="{{ $barang->id }}">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Submit Buttons -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Beli Barang</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

</body>
</html>
