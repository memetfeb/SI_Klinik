<?php

use App\Http\Controllers\WilayahController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('wilayah', WilayahController::class)->middleware('can:isSuperAdmin');
Route::resource('tindakan', TindakanController::class)->middleware('can:isSuperAdmin');
Route::resource('obat', ObatController::class)->middleware('can:isSuperAdmin');
Route::resource('pegawai', PegawaiController::class)->middleware('can:isSuperAdmin');
Route::resource('transaksi', TransaksiController::class)->middleware('can:isAllRole');
Route::resource('laporan', LaporanController::class)->middleware('can:isAllRole');


Route::get('/butuh_tindakan', [App\Http\Controllers\TransaksiController::class, 'index_tindakan'])->name('butuh_tindakan')->middleware('can:isAllRole');
Route::get('/butuh_pembayaran', [App\Http\Controllers\TransaksiController::class, 'index_tagihan'])->name('butuh_pembayaran')->middleware('can:isAllRole');

Route::put('/update_tindakan/{id}', [App\Http\Controllers\TransaksiController::class, 'update_tindakan'])->name('transaksi.update_tindakan')->middleware('can:isAllRole');
Route::put('/update_pembayaran/{id}', [App\Http\Controllers\TransaksiController::class, 'update_pembayaran'])->name('transaksi.update_pembayaran')->middleware('can:isAllRole');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('home', [App\Http\Controllers\HomeController::class]);