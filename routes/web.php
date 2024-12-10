<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\StockController;
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

//ROUTE BARANG MASUK
Route::resource('barangmasuk', BarangMasukController::class);
Route::get('exportExcelbm', [BarangMasukController::class, 'exportExcelbm'])->name('barangmasuk.exportExcelbm');
Route::get('exportPdfbm', [BarangMasukController::class, 'exportPdfbm'])->name('barangmasuk.exportPdfbm');

//ROUTE BARANG KELUAR
Route::resource('barangkeluar', BarangKeluarController::class);
Route::get('exportExcelbk', [BarangKeluarController::class, 'exportExcelbk'])->name('barangkeluar.exportExcelbk');
Route::get('exportPdfbk', [BarangKeluarController::class, 'exportPdfbk'])->name('barangkeluar.exportPdfbk');

// Rute untuk mengambil data barang untuk diedit
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROUTE ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index'); // Halaman khusus admin
    })->name('admin.dashboard');
});

// ROUTE MANAGER
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager', function () {
        return view('manager.index'); // Halaman khusus manager
    })->name('manager.dashboard');
});

// ROUTE STAFF A
Route::middleware(['auth', 'role:staffa'])->group(function () {
    Route::get('/staffa', function () {
        return view('staffa.index'); // Halaman khusus staffa
    })->name('staffa.dashboard');
});

// ROUTE STAFF B
Route::middleware(['auth', 'role:staffb'])->group(function () {
    Route::get('/staffb', function () {
        return view('staffb.index'); // Halaman khusus staffb
    })->name('staffb.dashboard');
});

// ROUTE PROJECT
Route::middleware(['auth', 'role:project'])->group(function () {
    Route::get('/project', function () {
        return view('project.index'); // Halaman khusus project
    })->name('project.dashboard');
});

// Halaman Unauthorized
Route::get('/unauthorized', function () {
    return view('unauthorized'); // Halaman akses ditolak
})->name('unauthorized');


// ROUTE ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
});

// ROUTE MANAGER
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
});

// ROUTE STAFF A
Route::middleware(['auth', 'role:staffa'])->group(function () {
    Route::get('/barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
});

// ROUTE STAFF B
Route::middleware(['auth', 'role:staffb'])->group(function () {
    Route::get('/barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
});

// ROUTE PROJECT
Route::middleware(['auth', 'role:project'])->group(function () {
    Route::get('/barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
});


Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');


// Route khusus Manager
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index');
    Route::post('/approval/{id}/approve', [ApprovalController::class, 'approve'])->name('approval.approve');
    Route::post('/approval/{id}/reject', [ApprovalController::class, 'reject'])->name('approval.reject');
});
