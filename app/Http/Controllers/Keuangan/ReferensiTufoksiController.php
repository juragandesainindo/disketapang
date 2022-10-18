<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ReferensiTufoksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReferensiTufoksiController extends Controller
{
    public function index()
    {
        $edit = 1;
        $data = ReferensiTufoksi::orderBy('tanggal','desc')->get();
        return view('keuangan.referensi.index',compact('data','edit'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('keuangan/referensi'),$imageName);

            $data = new ReferensiTufoksi ([
                'nomor_peraturan'   => $request->nomor_peraturan,
                'uraian'            => $request->uraian,
                'tanggal'           => $request->tanggal,
                'file'              => $imageName
            ]);

            $data->save();
        }

        return back()->with('success','Create Referensi Tufoksi successfully');
    }

    public function update(Request $request, $id)
    {
        $data = ReferensiTufoksi::findOrFail($id);

        if ($request->hasFile('file')) {
            if (File::exists('keuangan/referensi/'.$data->file)) {
                File::delete('keuangan/referensi/'.$data->file);
            }
                $file = $request->file('file');
                $data->file=time().'_'.$file->getClientOriginalName();
                $file->move(\public_path('keuangan/referensi'),$data->file);
                $request['file'] = $data->file;
             }

                $data->update([
                'nomor_peraturan'   => $request->nomor_peraturan,
                'uraian'            => $request->uraian,
                'tanggal'           => $request->tanggal,
                'file'              => $data->file
                ]);

        return back()->with('success', 'Edit Referensi Tufoksi successfully.');
    }

    public function destroy($id)
    {
        $data = ReferensiTufoksi::findOrFail($id);

        if (File::exists("keuangan/referensi/".$data->file))
        {
           File::delete("keuangan/referensi/".$data->file);
        }

        ReferensiTufoksi::find($id)->delete();

       return back()->with('success', 'Delete Referensi Tufoksi successfully.');
    }
}
