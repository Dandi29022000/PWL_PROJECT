<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Petugas;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    public $timestamps= false;
    protected $primaryKey = 'id_petugas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_petugas', 'nama_petugas','alamat','no_telepon'];
}
