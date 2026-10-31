
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\JadwalIbadahController;
use App\Models\JadwalIbadah;
use App\Http\Controllers\Admin\DokumentasiController;
use App\Models\Dokumentasi;
use App\Http\Controllers\Admin\BeritaController;
use App\Models\Berita;
use App\Http\Controllers\Admin\ProfilGerejaController;

// ==========================
// WEBSITE PENGUNJUNG
// ==========================

    Route::get('/', function () {
    return view('welcome');
    })->name('beranda');

    Route::get('/profil-gereja', function () {
    $profil = \App\Models\ProfilGereja::first();

    return view('profil', compact('profil'));
    })->name('profil');

    Route::get('/jadwal', function () {
    $jadwal = JadwalIbadah::where('aktif', true)
        ->orderBy('hari')
        ->orderBy('waktu_mulai')
        ->get();
    return view('jadwal', compact('jadwal'));
    })->name('jadwal');

    Route::get('/dokumentasi', function () {
    $dokumentasi = Dokumentasi::where('aktif', true)
        ->latest()
        ->get();

    return view('dokumentasi', compact('dokumentasi'));
    })->name('dokumentasi');

    Route::get('/lokasi', function () {
    $profil = \App\Models\ProfilGereja::first();

    return view('lokasi', compact('profil'));
    })->name('lokasi');

    Route::get('/berita', function () {
    $berita = Berita::where('status', 'terbit')
        ->where(function ($query) {
            $query->whereNull('tanggal_publikasi')
                ->orWhereDate('tanggal_publikasi', '<=', now());
        })
        ->latest()
        ->get();

    return view('berita', compact('berita'));
})->name('berita');

// ==========================
// DASHBOARD ADMIN
// ==========================

    Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('jadwal', JadwalIbadahController::class)
        ->except(['show']);

    Route::resource('dokumentasi', DokumentasiController::class)
    ->except(['show']);

    Route::resource('berita', BeritaController::class)
    ->parameters(['berita' => 'berita'])
    ->except(['show']);

    Route::get('/profil', [ProfilGerejaController::class, 'edit'])
    ->name('profil.edit');

    Route::put('/profil', [ProfilGerejaController::class, 'update'])
    ->name('profil.update');
});
