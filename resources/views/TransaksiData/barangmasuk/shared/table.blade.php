<div class="table-responsive">
    <table class="table table-bordered table-hover datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Masuk</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangmasuks as $index => $barangmasuk)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barangmasuk->nama }}</td>
                    <td>{{ $barangmasuk->jumlah }}</td>
                    <td>{{ $barangmasuk->tanggal }}</td>
                    <td>{{ $barangmasuk->keterangan }}</td>
                    <td>
                        <!-- Edit dan Delete -->
                        <a href="{{ route('barangmasuk.edit', $barangmasuk->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('barangmasuk.destroy', $barangmasuk->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
