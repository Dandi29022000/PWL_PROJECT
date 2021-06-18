<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserBiasaController;
use App\Http\Controllers\UserPelangganController;
use App\Http\Controllers\UserTransaksiController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', [Auth::class, 'logout'], function () {
    return abort(404);
});

Route::resource('produk', ProdukController::class)->middleware('auth');
Route::get('produk/cetak_pdf/{produk}', [ProdukController::class, 'cetak_pdf'])->name('produk.cetak_pdf');

Route::resource('pelanggan', PelangganController::class)->middleware('auth');
Route::resource('petugas', PetugasController::class)->middleware('auth');
Route::resource('produk_transaksi', TransaksiController::class)->middleware('auth');
Route::get('produk_transaksi/cetak_pdf/{produk_transaksi}', [TransaksiController::class, 'cetak_pdf'])->name('produk_transaksi.cetak_pdf');

Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/petugas', [UserBiasaController::class, 'petugas'])->name('user.petugas');
    Route::get('/produk', [UserBiasaController::class, 'produk'])->name('user.produk');
});

Route::resource('user_pelanggan', UserPelangganController::class)->middleware('auth');
Route::resource('user_transaksi', UserTransaksiController::class)->middleware('auth');
Route::get('user_transaksi/cetak_pdf/{user_transaksi}', [UserTransaksiController::class, 'cetak_pdf'])->name('user_transaksi.cetak_pdf');