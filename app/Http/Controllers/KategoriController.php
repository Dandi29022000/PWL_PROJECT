<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KategoriController extends Controller
{
    public function produkByKategori($id)
    {
       //menampilkan data sesua kategori yang diminta user
        $data = array(
            'produks' => Product::where('categories_id',$id)->paginate(9),
            'categories' => Categories::findOrFail($id)
        );
        return view('user.kategori',$data);
    }
}
