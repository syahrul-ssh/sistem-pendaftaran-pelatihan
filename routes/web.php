<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\CariController;
use App\Http\Controllers\CetakKartuController;
use App\Http\Controllers\CompleteController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PendaftaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\LandingController::class, 'landing'])->name('landing');

Auth::routes([
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('daftar', DaftarController::class);
Route::put('daftar-payed/{daftar:id}', [DaftarController::class, 'updatePayed'])->name('daftar.payed');
Route::get('/daftar-filtered/{daftar?}', [DaftarController::class, 'indexFiltered'])->name('daftar.filter');
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::get('/pendaftaran/{jadwal}/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::get('/tampil-pendaftar/{daftar:kode_unik}', [CariController::class, 'show'])->name('tampil.pendaftar');
Route::get('/cari', [CariController::class, 'search'])->name('cari');
Route::get('/cari/data', [CariController::class, 'find'])->name('cari_pendaftar');
Route::get('/cetak-kartu/{daftar}', [CetakKartuController::class, 'cetak'])->name('cetak');
Route::get('/cetak-absen', [CetakKartuController::class, 'cetakAbsen'])->name('cetak.absen');
Route::get('/cetak-absen-tanggal/{daftar?}', [CetakKartuController::class, 'cetakAbsenPerTanggal'])->name('cetak.absen.tanggal');
Route::get('/selesai/{daftar}', [CompleteController::class, 'getData'])->name('selesai');
Route::get('/selesai', [CompleteController::class, 'index'])->name('selesai.index');
Route::delete('/selesai/{selesai}', [CompleteController::class, 'destroy'])->name('selesai.destroy');
Route::resource('jadwal', JadwalController::class);
Route::put('jadwal-publish/{jadwal:id}', [JadwalController::class, 'publish'])->name('jadwal.publish');
Route::resource('pelatihan', PelatihanController::class);