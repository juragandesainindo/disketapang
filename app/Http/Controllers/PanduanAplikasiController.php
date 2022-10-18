<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PanduanAplikasiController extends Controller
{
    public function index()
    {
        return view('panduan-aplikasi.index');
    }
}