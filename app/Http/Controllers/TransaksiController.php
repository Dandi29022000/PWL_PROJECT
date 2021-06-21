<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk_Transaksi;
use App\Models\Product;
use App\Models\Pelanggan;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
       
        $produk_transaksi = Produk_Transaksi::where([
            ['tanggal','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('produk_id','LIKE','%'.$term.'%')
                          ->orWhere('pelanggan_id','LIKE','%'.$term.'%')
                          ->orWhere('tanggal','LIKE','%'.$term.'%')
                          ->orWhere('harga','LIKE','%'.$term.'%')
                          ->orWhere('qty','LIKE','%'.$term.'%')
                          ->orWhere('total_bayar','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id','asc')
        ->simplePaginate(5);
        
        return view('produk_transaksi.index' , compact('produk_transaksi'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $pelanggan = Pelanggan::all();
        return view('produk_transaksi.create', ['products' => $products], ['pelanggan' => $pelanggan]);
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
            'produk_id' => 'required',
            'pelanggan_id' => 'required',
            'tanggal' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            'total_bayar' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        $produk_transaksi = new Produk_Transaksi;
        $produk_transaksi->id = $request->get('id');
        $produk_transaksi->produk_id = $request->get('produk_id');
        $produk_transaksi->pelanggan_id = $request->get('pelanggan_id');
        $produk_transaksi->tanggal = $request->get('tanggal');
        $produk_transaksi->harga = $request->get('harga');
        $produk_transaksi->qty = $request->get('qty');
        $produk_transaksi->total_bayar = $request->get('total_bayar');
        $produk_transaksi->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('produk_transaksi.index')
            ->with('success', 'Transaksi Berhasil Ditambahkan');
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
        $Produk_Transaksi = Produk_Transaksi::with('pelanggan')->where('id', $id)->first();
        $products = Product::all();
        $pelanggan = Pelanggan::all();
        return view('produk_transaksi.detail', ['Produk_Transaksi' => $Produk_Transaksi,'Product' => $products, 'Pelanggan' => $pelanggan]);
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
        $Produk_Transaksi = Produk_Transaksi::with('pelanggan')->where('id', $id)->first();
        $products = Product::all();
        $pelanggan = Pelanggan::all();
        return view('produk_transaksi.edit', ['Produk_Transaksi' => $Produk_Transaksi,'Product' => $products, 'Pelanggan' => $pelanggan]);
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
            'produk_id' => 'required',
            'pelanggan_id' => 'required',
            'tanggal' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            'total_bayar' => 'required',
        ]);

        $products = new Product;
        $products->id = $request->get('produk_id');

        $pelanggan = new Pelanggan;
        $pelanggan->id_pelanggan = $request->get('pelanggan_id');

        // Fungsi eloquent untuk mengupdate data inputan kita
        Produk_Transaksi::find($id)->update($request->all());

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('produk_transaksi.index')
            ->with('success', 'Transaksi Berhasil Diupdate');
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
        Produk_Transaksi::find($id)->delete();
        return redirect()->route('produk_transaksi.index')
            ->with('success', 'Transaksi Berhasil Dihapus');
    }

    public function cetak_pdf($id){
        $products = Produk_Transaksi::with('produk')
            ->where('id', $id)
            ->get();
        $produk_transaksi = Produk_Transaksi::with('pelanggan')
            ->where('id', $id)
            ->get();
        $pdf = PDF::loadview('produk_transaksi.transaksi_pdf', compact('produk_transaksi', 'products'));
        return $pdf->stream();
    }
}
