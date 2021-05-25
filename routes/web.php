<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\ProdukController;
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

// Auth::routes();
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

Route::group(['middleware' => ['auth','checkRole:admin']],function(){    
    Route::get('/admin','DashboardController@index')->name('admin.dashboard');
    Route::get('/pengaturan/alamat','admin\PengaturanController@aturalamat')->name('admin.pengaturan.alamat');
    Route::get('/pengaturan/ubahalamat/{id}','admin\PengaturanController@ubahalamat')->name('admin.pengaturan.ubahalamat');
    Route::get('/pengaturan/alamat/getcity/{id}','admin\PengaturanController@getCity')->name('admin.pengaturan.getCity');
    Route::post('pengaturan/simpanalamat','admin\PengaturanController@simpanalamat')->name('admin.pengaturan.simpanalamat');
    Route::post('pengaturan/updatealamat/{id}','admin\PengaturanController@updatealamat')->name('admin.pengaturan.updatealamat');

    Route::get('/admin/categories','admin\CategoriesController@index')->name('admin.categories');
    Route::get('/admin/categories/tambah','admin\CategoriesController@tambah')->name('admin.categories.tambah');
    Route::post('/admin/categories/store','admin\CategoriesController@store')->name('admin.categories.store');
    Route::post('/admin/categories/update/{id}','admin\CategoriesController@update')->name('admin.categories.update');
    Route::get('/admin/categories/edit/{id}','admin\CategoriesController@edit')->name('admin.categories.edit');
    Route::get('/admin/categories/delete/{id}','admin\CategoriesController@delete')->name('admin.categories.delete');

    Route::get('/admin/product','admin\ProductController@index')->name('admin.product');
    Route::get('/admin/product/tambah','admin\ProductController@tambah')->name('admin.product.tambah');
    Route::post('/admin/product/store','admin\ProductController@store')->name('admin.product.store');
    Route::get('/admin/product/edit/{id}','admin\ProductController@edit')->name('admin.product.edit');
    Route::get('/admin/product/delete/{id}','admin\ProductController@delete')->name('admin.product.delete');
    Route::post('/admin/product/update/{id}','admin\ProductController@update')->name('admin.product.update');

    Route::get('/admin/transaksi','admin\TransaksiController@index')->name('admin.transaksi');
    Route::get('/admin/transaksi/perludicek','admin\TransaksiController@perludicek')->name('admin.transaksi.perludicek');
    Route::get('/admin/transaksi/perludikirim','admin\TransaksiController@perludikirim')->name('admin.transaksi.perludikirim');
    Route::get('/admin/transaksi/dikirim','admin\TransaksiController@dikirim')->name('admin.transaksi.dikirim');
    Route::get('/admin/transaksi/detail/{id}','admin\TransaksiController@detail')->name('admin.transaksi.detail');
    Route::get('/admin/transaksi/konfirmasi/{id}','admin\TransaksiController@konfirmasi')->name('admin.transaksi.konfirmasi');
    Route::post('/admin/transaksi/inputresi/{id}','admin\TransaksiController@inputresi')->name('admin.transaksi.inputresi');
    Route::get('/admin/transaksi/selesai','admin\TransaksiController@selesai')->name('admin.transaksi.selesai');
    Route::get('/admin/transaksi/dibatalkan','admin\TransaksiController@dibatalkan')->name('admin.transaksi.dibatalkan');

    Route::get('/admin/rekening','admin\RekeningController@index')->name('admin.rekening');
    Route::get('/admin/rekening/edit/{id}','admin\RekeningController@edit')->name('admin.rekening.edit');
    Route::get('/admin/rekening/tambah','admin\RekeningController@tambah')->name('admin.rekening.tambah');
    Route::post('/admin/rekening/store','admin\RekeningController@store')->name('admin.rekening.store');
    Route::get('/admin/rekening/delete/{id}','admin\RekeningController@delete')->name('admin.rekening.delete');
    Route::post('/admin/rekening/update/{id}','admin\RekeningController@update')->name('admin.rekening.update');

    Route::get('/admin/pelanggan','admin\PelangganController@index')->name('admin.pelanggan');
});