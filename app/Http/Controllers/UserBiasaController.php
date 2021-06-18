<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Product;

class UserBiasaController extends Controller
{
    public function produk(Request $request){
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
        
        return view('user.produk' , compact('products'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function petugas(Request $request){
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
        
        return view('user.petugas' , compact('petugas'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
}
