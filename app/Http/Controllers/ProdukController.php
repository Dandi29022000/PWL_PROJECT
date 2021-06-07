<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use PDF;
use Illuminate\Support\Facades\Storage;

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
        // Melakukan validasi data
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg',
            'price' => 'required',
            'weigth' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        if ($request->file('image')) 
        {
            $image_name = $request->file('image')->store('images', 'public');
            Product::create([
                'id'            => $request->id,
                'name'          => $request->name,
                'description'   => $request->description,
                'image'         => $image_name,
                'price'         => $request->price,
                'weigth'        => $request->weigth,
            ]);
        }

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
        if ($request->image && file_exists(storage_path('app/public/' . $request->image)))
        {
            Storage::delete(['public/' .$request->image]);
        }
        $image_name = $request->file('image')->store('images', 'public');
        // Fungsi eloquent untuk mengupdate data inputan kita
        $update = Product::find($id);
        $update->name = $request->get('name');
        $update->description = $request->get('description');
        $update->image = $image_name;
        $update->price = $price->get('price');
        $update->weigth = $weigth->get('weigth'); 
        $update->save();

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
