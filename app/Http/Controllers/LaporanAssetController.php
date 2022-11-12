<?php

namespace App\Http\Controllers;

use App\Models\AssetUmum;
use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanAssetController extends Controller
{
    public function index(Request $request)
    {
        $thnNow = Carbon::now()->isoFormat('Y');
        $year = $request->input('year');
        if ($request->has('ganjil')) {
            $assets = AssetUmum::whereMonth('tgl_perolehan', '>=', '01')
                ->whereMonth('tgl_perolehan', '<=', '06')
                ->whereYear('tgl_perolehan', $thnNow)
                ->get();
        } elseif ($request->has('genap')) {
            $assets = AssetUmum::whereMonth('tgl_perolehan', '>=', '07')
                ->whereMonth('tgl_perolehan', '<=', '12')
                ->whereYear('tgl_perolehan', $thnNow)
                ->get();
        } elseif ($request->has('year')) {
            $assets = AssetUmum::whereYear('tgl_perolehan', $year)->get();
        } else {
            $assets = AssetUmum::all();
        }


        $totalBrg = $assets->sum('nilai_brg');
        $totalSurut = $assets->sum('nilai_surut');
        $totalPerolehan = $assets->sum('nilai_perolehan');

        return view('umum.asset.laporan-asset.index', compact('assets', 'totalBrg', 'totalSurut', 'totalPerolehan'));
    }

    public function pdf(Request $request)
    {
        $thnNow = Carbon::now()->isoFormat('Y');
        $year = $request->input('year');

        $kasubUmum = Pegawai::all();
        $namakasubUmum = "";
        $nipkasubUmum = "";
        foreach ($kasubUmum as $kad) {
            foreach ($kad->pegawaiJabatan->where('nama_jabatan', 'Kasubbag Umum') as $val) {
                if ($kad->pegawaiJabatan->count() > 0) {
                    $namakasubUmum = $kad->nama;
                    $nipkasubUmum = $kad->nip;
                } else {
                }
            }
        }

        if ($request->has('ganjil')) {
            $assets = AssetUmum::whereMonth('tgl_perolehan', '>=', '01')
                ->whereMonth('tgl_perolehan', '<=', '06')
                ->whereYear('tgl_perolehan', $thnNow)
                ->get();
        } elseif ($request->has('genap')) {
            $assets = AssetUmum::whereMonth('tgl_perolehan', '>=', '07')
                ->whereMonth('tgl_perolehan', '<=', '12')
                ->whereYear('tgl_perolehan', $thnNow)
                ->get();
        } elseif ($request->has('year')) {
            $assets = AssetUmum::whereYear('tgl_perolehan', $year)->get();
        } else {
            $assets = AssetUmum::all();
        }

        $totalBrg = $assets->sum('nilai_perolehan');

        $pdf = PDF::loadView('umum.asset.laporan-asset.pdf', compact('assets', 'totalBrg', 'namakasubUmum', 'nipkasubUmum'))->setPaper('a4', 'landscape');
        $fileName = date(now());
        return $pdf->stream($fileName . '_laporan-asset-semester.pdf');
    }
}