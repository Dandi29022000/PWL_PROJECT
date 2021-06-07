<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps= false;
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image','description','price','weigth'];

    public function produktransaksi(){
        return $this->hasMany(Produk_Transaksi::class);
    }
}
