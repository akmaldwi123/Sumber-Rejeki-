<?php
namespace App\Http\Controllers;

use App\Models\StokBarang;
use App\Models\BeliBarang;
use App\Models\BarangPembelian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BeliBarangController extends Controller
{
    public function index()
{
    $beliBarang = BeliBarang::with('barangDibeli')->get();
    return view('beli_barang.index', compact('beliBarang'));
}
    public function create()
    {
        $stokBarang = StokBarang::all(); // Ambil semua data barang
        return view('beli_barang.create', compact('stokBarang'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'alamat_proyek' => 'required|string|max:255',
            'jenis_proyek' => 'required|string|max:255',
            'kategori_proyek' => 'required|string|max:255',
            'pic_lapangan' => 'required|string|max:255',
            'kontak_pic' => 'required|string|max:255',
            'barang' => 'required|array|min:1',
            'barang.*.jumlah' => 'required|integer|min:1',
            'barang.*.id' => 'required|exists:stock_barang,id',
        ]);

        // Simpan data proyek
        $beliBarang = BeliBarang::create($request->only(['nama_proyek', 'alamat_proyek', 'jenis_proyek', 'kategori_proyek', 'pic_lapangan', 'kontak_pic']));

        // Simpan pembelian barang
        foreach ($request->barang as $barangData) {
            $barang = StokBarang::findOrFail($barangData['id']);
            
            // Simpan item pembelian barang
            $itemPembelian = BarangPembelian::create([
                'beli_barang_id' => $beliBarang->id,
                'stock_barang_id' => $barang->id,
                'jumlah' => $barangData['jumlah'],
            ]);

            // Kurangi stok barang
            $barang->stock -= $barangData['jumlah'];
            $barang->save();
        }

        Alert::success('Pembelian Sukses', 'Barang berhasil dibeli!');

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('beli_barang.index')->with('success', 'Pembelian barang berhasil!');

    }
}
