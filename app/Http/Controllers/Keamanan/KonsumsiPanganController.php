<?php

namespace App\Http\Controllers\Keamanan;

use App\Http\Controllers\Controller;
use App\Models\KonsumsiPangan;
use App\Models\KwtKecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Exports\KonsumsiPanganExport;
use Maatwebsite\Excel\Facades\Excel;

class KonsumsiPanganController extends Controller
{
    public function index()
    {
        $edit = 1;
        $data = KonsumsiPangan::with('KwtKecamatan')->get();
        $kecamatan = KwtKecamatan::all();
        return view('keamanan.konsumsi-pangan.index',compact('kecamatan','data','edit'));
    }
    
    public function store(Request $req)
    {
        $data = new KonsumsiPangan([
            'kwt_kecamatan_id'  => $req->kwt_kecamatan_id,
            'skor_pph'          => $req->skor_pph
            ]);
        $data->save();
        return back()->with('success','Create konsumsi pangan successfully');
    }
    
    public function update(Request $req,$id)
    {
        $data = KonsumsiPangan::findOrFail($id);
        $data->update([
            'kwt_kecamatan_id'  => $req->kwt_kecamatan_id,
            'skor_pph'          => $req->skor_pph
            ]);
        return back()->with('success','Update konsumsi pangan successfully');
    }
    
    public function destroy($id)
    {
        $data = KonsumsiPangan::findOrFail($id);
        KonsumsiPangan::find($id)->delete();
        return back()->with('success','Delete konsumsi pangan successfully');
    }
    
    public function excel()
    {
        return Excel::download(new KonsumsiPanganExport, 'konsumsi-pangan.xlsx');
    }
}
