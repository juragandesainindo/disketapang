<?php

namespace App\Http\Controllers;

use App\Models\AssetUmum;
use App\Models\Kendaraan;
use App\Models\Pegawai;
use App\Models\PetaJabatan;
use App\Models\Sop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if (Auth::user()->role_name === 'Kasub Bagian Umum') {
        //     $pegawai = Pegawai::count();
        //     $sop = Sop::count();
        //     $peta = PetaJabatan::count();
        //     $kendaraan = Kendaraan::count();

        //     $nilaiBrg = AssetUmum::all();
        //     $date = date(now()->isoFormat('Y'));

        //     if ($nilaiBrg) {
        //         $kibA = AssetUmum::where('kategori', 'KibA')->whereYear('tgl_perolehan', $date)->sum('nilai_brg');
        //     }
        //     if ($nilaiBrg) {
        //         $kibB = AssetUmum::where('kategori', 'KibB')->whereYear('tgl_perolehan', $date)->sum('nilai_brg');
        //     }
        //     if ($nilaiBrg) {
        //         $kibC = AssetUmum::where('kategori', 'KibC')->whereYear('tgl_perolehan', $date)->sum('nilai_brg');
        //     }
        //     if ($nilaiBrg) {
        //         $kibD = AssetUmum::where('kategori', 'KibD')->whereYear('tgl_perolehan', $date)->sum('nilai_brg');
        //     }
        //     if ($nilaiBrg) {
        //         $kibE = AssetUmum::where('kategori', 'KibE')->whereYear('tgl_perolehan', $date)->sum('nilai_brg');
        //     }
        //     if ($nilaiBrg) {
        //         $kibF = AssetUmum::where('kategori', 'KibF')->whereYear('tgl_perolehan', $date)->sum('nilai_brg');
        //     }
        //     if ($nilaiBrg) {
        //         $Atb = AssetUmum::where('kategori', 'Atb')->whereYear('tgl_perolehan', $date)->sum('nilai_brg');
        //     }

        //     return view('umum.home', compact('pegawai', 'sop', 'peta', 'kendaraan', 'kibA', 'kibB', 'kibC', 'kibD', 'kibE', 'kibF', 'Atb'));
        // } else {

        // $kendaraan = DB::table('kendaraan')->count();
        // $count = DB::table('pegawai')->get();

        return view('umum.home');
        // }
    }
}