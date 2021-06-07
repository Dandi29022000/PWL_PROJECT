<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $pelanggan = Pelanggan::where([
            ['nama_pelanggan','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('nama_pelanggan','LIKE','%'.$term.'%')
                          ->orWhere('alamat','LIKE','%'.$term.'%')
                          ->orWhere('no_telepon','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id_pelanggan','asc')
        ->simplePaginate(5);
        
        return view('pelanggan.index' , compact('pelanggan'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('image')){
            $image_name = $request->file('image')->store('images', 'public');
        }

        // Melakukan validasi data
        $request->validate([
            'id_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'gambar' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        Pelanggan::create($request->all());

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pelanggan)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $Pelanggan = Pelanggan::find($id_pelanggan);
        return view('pelanggan.detail', compact('Pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pelanggan)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Pelanggan = Pelanggan::find($id_pelanggan);
        return view('pelanggan.edit', compact('Pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelanggan)
    {
        // Melakukan validasi data
        $request->validate([
            'id_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'gambar' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        $pelanggan = Pelanggan::find($id_pelanggan)->update($request->all());

        if($pelanggan->gambar && file_exists(storage_path('app/public/' . $pelanggan->gambar))){
            \Storage::delete('public/' . $pelanggan->gambar);
        }

        $image_name = $request->file('image')->store('images', 'public');
        $pelanggan->gambar = $image_name;

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelanggan)
    {
        // Fungsi eloquent untuk menghapus data
        Pelanggan::find($id_pelanggan)->delete();
        return redirect()->route('pelanggan.index')
            -> with('success', 'Pelanggan Berhasil Dihapus');
    }
}
