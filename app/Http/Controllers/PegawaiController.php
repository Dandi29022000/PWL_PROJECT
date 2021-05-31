<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(){
        return view('pegawai')
            ->with('pegawais', Pegawai::pegawai());
    }
}
