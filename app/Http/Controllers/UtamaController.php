<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Anggota;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index')
                ->with('posts', Post::index())
                ->with('anggotas', Anggota::anggota())
                ->with('menus', Menu::menu());
    }
}
