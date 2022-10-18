<?php

namespace App\Http\Controllers\Distribusi;

use App\Http\Controllers\Controller;
use App\Models\DataKampungPangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Exports\DataKampungPanganExport;
use Maatwebsite\Excel\Facades\Excel;

class DataKampungPanganController extends Controller
{
    public function index()
    {
        $edit = 1;
        $data = DataKampungPangan::orderBy('tahun','desc')->get();
        return view('distribusi.data-kampung-pangan.index', compact('data','edit'));
    }
    
    public function store(Request $request)
    {
        if($request->hasFile("file")){
            $file=$request->file("file");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("distribusi/data-kampung-pangan"),$imageName);

            $data = new DataKampungPangan([
                'nama'              => $request->nama,
                'alamat'            => $request->alamat,
                'kecamatan'         => $request->kecamatan,
                'tahun'             => $request->tahun,
                'jumlah_anggota'    => $request->jumlah_anggota,
                'jenis_pelatihan'   => $request->jenis_pelatihan,
                'jenis_bantuan'     => $request->jenis_bantuan,
                'file'              => $imageName
            ]);
           $data->save();
        }

        return back()->with('success', 'Create Data Kampung Pangan successfully');
    }
    
    public function show($id)
    {
        $data = DataKampungPangan::findOrFail($id);
        return view('distribusi.data-kampung-pangan.show', compact('data'));
    }
    
    public function update(Request $request, $id)
    {
        $data = DataKampungPangan::findOrFail($id);
         if($request->hasFile("file")){
             if (File::exists("distribusi/data-kampung-pangan/".$data->file)) {
                 File::delete("distribusi/data-kampung-pangan/".$data->file);
             }
             $file=$request->file("file");
             $data->file=time()."_".$file->getClientOriginalName();
             $file->move(\public_path("distribusi/data-kampung-pangan"),$data->file);
             $request['file']=$data->file;
         }

            $data->update([
                'nama'              => $request->nama,
                'alamat'            => $request->alamat,
                'kecamatan'         => $request->kecamatan,
                'tahun'             => $request->tahun,
                'jumlah_anggota'    => $request->jumlah_anggota,
                'jenis_pelatihan'   => $request->jenis_pelatihan,
                'jenis_bantuan'     => $request->jenis_bantuan,
                'file'              => $data->file
            ]);

            return back()->with('success', 'Update Data Kampung Pangan successfully');
    }
    
    public function destroy($id)
    {
        $data = DataKampungPangan::findOrFail($id);

        if (File::exists("distribusi/data-kampung-pangan/".$data->file))
        {
           File::delete("distribusi/data-kampung-pangan/".$data->file);
        }

        DataKampungPangan::find($id)->delete();

       return back()->with('success', 'Delete Data Kampung Pangan successfully.');
    }
    
    public function export()
    {
        return Excel::download(new DataKampungPanganExport, 'data-kampung-pangan.xlsx');
    }
}
