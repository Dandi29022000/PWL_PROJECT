<?php

namespace App\Http\Controllers;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index(){
        return view('petugas')
            ->with('petugas', Petugas::petugas());
    }
}
