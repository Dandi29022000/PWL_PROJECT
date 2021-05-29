<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function produk(Request $request){
        if($request->has('search')){
            $products = Product::where('name', 'like', "%".$request->search."%")->get();
        } else {
            $products = Product::all();   
        }
        return view('admin.products', compact('products'));
    }

    public function accProduk($id){
        $products = Product::find($id);

        $nik = AnggotaKeluarga::max('nik');
        $nik_ayah = $surat->nik_ayah;
        $kk = AnggotaKK::where('nik', $nik_ayah)->first();
        $no_kk = $kk->no_kk;

        $anggotaKeluarga = new AnggotaKeluarga;
        $anggotaKeluarga->nik = $nik+1;
        $anggotaKeluarga->nama = $surat->nama_anak;
        $anggotaKeluarga->jenis_kelamin = $surat->jenis_kelamin;
        $anggotaKeluarga->tempat_lahir = $surat->tempat_lahir;
        $anggotaKeluarga->tanggal_lahir = $surat->waktu_lahir;
        $anggotaKeluarga->agama = $surat->agama;
        $anggotaKeluarga->pendidikan = 'Tidak ada';
        $anggotaKeluarga->jenis_pekerjaan = 'Belum bekerja';
        $anggotaKeluarga->status_pernikahan = 'Belum Kawin';
        $anggotaKeluarga->kewarganegaraan = 'Indonesia';
        $anggotaKeluarga->foto = '/images/user.jpg';
        $anggotaKeluarga->save();

        $anggotaKK = new AnggotaKK;
        $anggotaKK->no_kk = $no_kk;
        $anggotaKK->nik = $nik+1;
        $anggotaKK->save();

        $surat->status = 1;
        $surat->save();

        return redirect()->route('admin.surat-kelahiran')
            ->with('success', 'Surat Kelahiran Berhasil Disetujui!');
    }
}
