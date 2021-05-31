<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(){
        return view('menu')
                ->with('menus', Menu::menu());
    }
}
