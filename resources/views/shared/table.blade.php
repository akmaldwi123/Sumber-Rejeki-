<div class="table-responsive">
    <table class="table table-bordered table-hover datatable">
        <thead>
            <tr>
                <th>No</th>
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
            @foreach ($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->merk }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>
                        <!-- Edit dan Delete -->
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;">
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
