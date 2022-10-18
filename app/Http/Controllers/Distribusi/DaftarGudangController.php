<?php

namespace App\Http\Controllers\Distribusi;

use App\Http\Controllers\Controller;
use App\Models\DaftarGudang;
use Illuminate\Http\Request;
use App\Exports\DaftarGudangExport;
use Maatwebsite\Excel\Facades\Excel;

class DaftarGudangController extends Controller
{
    public function index()
    {
        $edit = 1;
        $data = DaftarGudang::orderBy('id','desc')->get();
        return view('distribusi.daftar-gudang.index', compact('edit','data'));
    }
    
    public function store(Request $request)
    {
        $data = new DaftarGudang([
            'bentuk_usaha'              => $request->bentuk_usaha,
            'nama_perusahaan'           => $request->nama_perusahaan,
            'alamat_perusahaan'         => $request->alamat_perusahaan,
            'telepon_perusahaan'        => $request->telepon_perusahaan,
            'penanggung_jwb_perusahaan' => $request->penanggung_jwb_perusahaan,
            'alamat_gudang'             => $request->alamat_gudang,
            'telepon_gudang'            => $request->telepon_gudang,
            'penanggung_jwb_gudang'     => $request->penanggung_jwb_gudang,
    	    'no_tdg'                    => $request->no_tdg,
    	    'jenis_gudang'              => $request->jenis_gudang,
    	    'luas_gudang'               => $request->luas_gudang
            ]);
        
        $data->save();
        
        return back()->with('success','Upload gudang successfully');
    }
    
    public function update(Request $request, $id)
    {
        $data = DaftarGudang::findOrFail($id);
        $data->update([
            'bentuk_usaha'              => $request->bentuk_usaha,
            'nama_perusahaan'           => $request->nama_perusahaan,
            'alamat_perusahaan'         => $request->alamat_perusahaan,
            'telepon_perusahaan'        => $request->telepon_perusahaan,
            'penanggung_jwb_perusahaan' => $request->penanggung_jwb_perusahaan,
            'alamat_gudang'             => $request->alamat_gudang,
            'telepon_gudang'            => $request->telepon_gudang,
            'penanggung_jwb_gudang'     => $request->penanggung_jwb_gudang,
    	    'no_tdg'                    => $request->no_tdg,
    	    'jenis_gudang'              => $request->jenis_gudang,
    	    'luas_gudang'               => $request->luas_gudang
            ]);
            
        return back()->with('success','Edit gudang successfully');
    }
    
    public function destroy($id)
    {
        $data = DaftarGudang::findOrFail($id);
        DaftarGudang::find($id)->delete();
        
        return back()->with('success','Delete gudang successfully');
    }
    
    public function export()
    {
        return Excel::download(new DaftarGudangExport, 'daftar-gudang.xlsx');
    }
}