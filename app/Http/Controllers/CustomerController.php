<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Menu;

class CustomerController extends Controller
{
    public function index(){
        return view('today-special')
            ->with('anggotas', Anggota::anggota())
            ->with('menus', Menu::menu());
    }
}
