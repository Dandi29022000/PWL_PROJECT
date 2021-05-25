<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailorder extends Model
{
    use HasFactory;
    
    protected $table = 'detail_order';
    protected $fillable = ['order_id','product_id','qty'];
}
