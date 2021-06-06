<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Pelanggan;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index')
                ->with('posts', Post::index())
                ->with('pelanggan', Pelanggan::pelanggan())
                ->with('menus', Menu::menu());
    }
}
