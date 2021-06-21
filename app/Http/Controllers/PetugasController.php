<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $petugas = Petugas::where([
            ['nama_petugas','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('nama_petugas','LIKE','%'.$term.'%')
                          ->orWhere('alamat','LIKE','%'.$term.'%')
                          ->orWhere('no_telepon','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id_petugas','asc')
        ->simplePaginate(5);
        
        return view('petugas.index' , compact('petugas'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'nama_petugas' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        if ($request->file('gambar')) {
            $image_name = $request->file('gambar')->store('images', 'public');
        }
            Petugas::create([
                'nama_petugas'             => $request->nama_petugas,
                'gambar'                   => $image_name,
                'alamat'                   => $request->alamat,
                'no_telepon'               => $request->no_telepon,
            ]);

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('petugas.index')
            ->with('success', 'Petugas Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_petugas)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $Petugas = Petugas::find($id_petugas);
        return view('petugas.detail', compact('Petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_petugas)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Petugas = Petugas::find($id_petugas);
        return view('petugas.edit', compact('Petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_petugas)
    {
        // Melakukan validasi data
        $request->validate([
            'nama_petugas' => 'required',
            'gambar' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        if($request->gambar && file_exists(storage_path('app/public/' . $request->gambar))){
            \Storage::delete('public/' . $request->gambar);
        }
        
        $image_name = $request->file('gambar')->store('images', 'public');
        $update = Petugas::find($id_petugas);
        $update->nama_petugas = $request->get('nama_petugas');
        $update->gambar = $image_name;
        $update->alamat = $request->get('alamat');
        $update->no_telepon = $request->get('no_telepon');
        $update->save();

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('petugas.index')
            ->with('success', 'Petugas Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_petugas)
    {
        // Fungsi eloquent untuk menghapus data
        Petugas::find($id_petugas)->delete();
        return redirect()->route('petugas.index')
            -> with('success', 'Petugas Berhasil Dihapus');
    }
}
