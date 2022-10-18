<?php

namespace App\Http\Controllers\Keamanan;

use App\Http\Controllers\Controller;
use App\Models\DataPanganLokal;
use App\Models\KwtKelompok;
use App\Models\KwtKelurahan;
use App\Models\KwtKecamatan;
use Illuminate\Http\Request;
use App\Exports\DataPanganLokalExport;
use Maatwebsite\Excel\Facades\Excel;

class DataPanganLokalController extends Controller
{
    public function index()
    {
        $edit = 1;
        $data = DataPanganLokal::all();
        $kwt = KwtKelompok::all();
        return view('keamanan.data-pangan-lokal.index',compact('data','kwt','edit')); 
    }
    
    public function store(Request $request)
    {
        $data = new DataPanganLokal([
            'jenis_komoditi'    => $request->jenis_komoditi,
            'jenis_olahan'      => $request->jenis_olahan,
            'surat_ijin'        => $request->surat_ijin,
            'keterangan'        => $request->keterangan,
            'kwt_kelompok_id'   => $request->kwt_kelompok_id
            ]);
        
        $data->save();
        return back()->with('success','Create Data Pangan Lokal dan Olahan successfully');
    }
    
    public function update(Request $request,$id)
    {
        $data = DataPanganLokal::findOrFail($id);
        $data->update([
            'jenis_komoditi'    => $request->jenis_komoditi,
            'jenis_olahan'      => $request->jenis_olahan,
            'surat_ijin'        => $request->surat_ijin,
            'keterangan'        => $request->keterangan,
            'kwt_kelompok_id'   => $request->kwt_kelompok_id
            ]);
        
        return back()->with('success','Update Data Pangan Lokal dan Olahan successfully');
    }
    
    public function destroy($id)
    {
        $data = DataPanganLokal::findOrFail($id);
        DataPanganLokal::find($id)->delete();
        return back()->with('success','Update Data Pangan Lokal dan Olahan successfully');
    }
    
    public function export()
    {
        return Excel::download(new DataPanganLokalExport, 'data-pangan-lokal.xlsx');
    }
}