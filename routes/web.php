<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BeliBarangController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApprovalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::redirect('/', '/stock');

//ROUTE LOGIN
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//ROUTE STOCK
Route::resource('stock', StockController::class);
Route::get('exportExcel', [StockController::class, 'exportExcel'])->name('stock.exportExcel');
Route::get('exportPdf', [StockController::class, 'exportPdf'])->name('stock.exportPdf');
Route::resource('beli_barang', BeliBarangController::class);

// Route::middleware(['auth'])->group(function () {
//     // Rute untuk menampilkan daftar stock
//     Route::get('stock', [StockController::class, 'index'])->name('stock.index');

//     // Rute untuk menambahkan stock
//     Route::post('stock', [StockController::class, 'store'])->name('stock.store');
    
//     // Rute untuk mengedit stock
//     Route::get('stock/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
//     Route::put('stock/{id}', [StockController::class, 'update'])->name('stock.update');
    
//     // Rute untuk menghapus stock
//     Route::delete('stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');
// });


//ROUTE BARANG MASUK
Route::resource('barangmasuk', BarangMasukController::class);
Route::get('exportExcelbm', [BarangMasukController::class, 'exportExcelbm'])->name('barangmasuk.exportExcelbm');
Route::get('exportPdfbm', [BarangMasukController::class, 'exportPdfbm'])->name('barangmasuk.exportPdfbm');

//ROUTE BARANG KELUAR
Route::resource('barangkeluar', BarangKeluarController::class);
Route::get('exportExcelbk', [BarangKeluarController::class, 'exportExcelbk'])->name('barangkeluar.exportExcelbk');
Route::get('exportPdfbk', [BarangKeluarController::class, 'exportPdfbk'])->name('barangkeluar.exportPdfbk');
Route::post('/stock/beli/{id}', [StockController::class, 'beliBarang'])->name('stock.beli');


// Rute untuk mengambil data barang untuk diedit
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

