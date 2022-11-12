<?php

namespace App\Http\Controllers\umum\asset;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\PegawaiJabatan;
use App\Models\PegawaiPangkat;
use Illuminate\Http\Request;

class DropdownDependentController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        // dd($pegawais->toArray());
        return view('umum.asset.dropdown.index', compact('pegawais'));
    }

    public function getPangkat(Request $request)
    {
        $pangkats = PegawaiPangkat::where('pegawai_id', $request->pegawai_id)->orderByDesc('tmt_pangkat')->take(1)->get();
        if (count($pangkats) > 0) {
            return response()->json($pangkats);
        }
    }

    public function getJabatan(Request $request)
    {
        $jabatan = PegawaiJabatan::where('pegawai_id', $request->pegawai_id)->orderByDesc('tmt_jabatan')->take(1)->get();
        if (count($jabatan) > 0) {
            return response()->json($jabatan);
        }
    }
}