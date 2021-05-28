<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
// use App\Http\Controllers\ContactController;
// use App\Http\Controllers\CustomerController;
// use App\Http\Controllers\MenuController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\PegawaiController;
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

Route::get('/',[WelcomeController::class, 'index'])->name('home');
Route::get('/home',[WelcomeController::class, 'index'])->name('home2');
Route::get('/kontak',[WelcomeController::class, 'kontak'])->name('kontak');
Route::get('/produk',[ProdukController::class, 'index'])->name('user.produk');
Route::get('/produk/cari',[ProdukController::class, 'cari'])->name('user.produk.cari');
Route::get('/kategori/{id}', [KategoriController::class, 'produkByKategori'])->name('user.kategori');
Route::get('/produk/{id}', [ProdukController::class, 'detail'])->name('user.produk.detail');

Route::get('/pelanggan',function(){
    return 'Pelanggan';
});

