<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Menu;

class PelangganController extends Controller
{
    public function index(){
        return view('today-special')
            ->with('pelanggan', Pelanggan::anggota())
            ->with('menus', Menu::menu());
    }
}
