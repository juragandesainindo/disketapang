<?php

namespace App\Http\Controllers\Umum\Asset\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanPernyataanController extends Controller
{
    public function index()
    {
        return view('umum.asset.laporan.pernyataan.index');
    }
}