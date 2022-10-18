<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class InformasiAplikasiController extends Controller
{
    public function index()
    {
        return view('informasi-aplikasi.index');
    }
    
    public function indexBerita()
    {
        return view('informasi-aplikasi.berita.index');
    }
}