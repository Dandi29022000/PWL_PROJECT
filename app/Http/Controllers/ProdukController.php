<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

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
                          ->orWhere('weigth','LIKE','%'.$term.'%')
                          ->orWhere('price','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id','asc')
        ->simplePaginate(5);
        
        return view('produk.index' , compact('products'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
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
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'weigth' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        Product::create($request->all());

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('produk.index')
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
        return view('produk.detail', compact('Product'));
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
        return view('produk.edit', ['Product' => $Product]);
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
            'price' => 'required',
            'weigth' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        $products = Product::find($id)->update($request->all());
        
        if($products->image && file_exists(storage_path('app/public/' . $products->image))){
            \Storage::delete('public/' . $products->image);
        }

        $image_name = $request->file('image')->store('images', 'public');
        $products->image = $image_name;

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('produk.index')
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
        return redirect()->route('produk.index')
            -> with('success', 'Produk Berhasil Dihapus');
    }

    public function cetak_pdf(){
        $products = Product::all();
        $pdf = PDF::loadview('produk.produk_pdf', ['products'=>$products]);
        return $pdf->stream();
    }
}
