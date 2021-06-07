<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    public $timestamps= false;
    protected $primaryKey = 'id_pelanggan';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_pelanggan', 'nama_pelanggan','gambar', 'alamat','no_telepon'];

    public function produktransaksi(){
        return $this->hasMany(Produk_Transaksi::class);
    }
}
