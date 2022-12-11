<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;

class FrontendController extends Controller
{

    public function index()
    {
        return view('welcome');
    }
    public function tentang()
    {
        return view('tentang');
    }

    public function kontak()
    {
        return view('kontak');
    }
    public function lokasi()
    {
        return view('lokasi');
    }
    public function penilaian()
    {
        return view('penilaian');
    }
    public function hasil()
    {
        return view('hasil');
    }
    public function fhasil()
    {
        return view('admin.hasil.index');
    }

    public function flokasi()
    {
        $lokasis = Lokasi::all();
        return view('home', ['lokasis' => $lokasis]);
    }
}
