<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $products = Product::where([
            ['name','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('name','LIKE','%'.$term.'%')
                          ->orWhere('description','LIKE','%'.$term.'%')
                          ->orWhere('weight','LIKE','%'.$term.'%')
                          ->orWhere('price','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id','asc')
        ->simplePaginate(5);
        
        return view('products.index' , compact('products'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'weight' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        Product::create($request->all());

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('products.index')
            ->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $Product = Product::find($id);
        return view('products.detail', compact('Product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Product = Product::find($id);
        return view('products.edit', compact('Product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Melakukan validasi data
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'weight' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        Product::find($id)->update($request->all());

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('products.index')
            ->with('success', 'Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Product::find($id)->delete();
        return redirect()->route('products.index')
            -> with('success', 'Produk Berhasil Dihapus');
    }
}
