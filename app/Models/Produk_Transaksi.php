<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk_Transaksi;

class Produk_Transaksi extends Model
{
    use HasFactory;
    protected $table = 'produk_transaksi';
    public $timestamps= false;
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','produk_id','pelanggan_id','tanggal','harga', 'qty', 'total_bayar'];

    public function produk(){
        return $this->belongsTo(Product::class, 'produk_id', 'id');
    }
    
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id_pelanggan');
    }
}
