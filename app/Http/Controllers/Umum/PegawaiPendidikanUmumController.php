<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\PegawaiPendidikanUmumRequest;
use App\Models\PegawaiPendidikanUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiPendidikanUmumController extends Controller
{
    public function store(PegawaiPendidikanUmumRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pendidikan-umum'), $imageName);
            $input['foto'] = $imageName;
        }

        PegawaiPendidikanUmum::create($input);

        Alert::success('Success', 'Create pegawai pendidikan umum has been successfully');
        return back();
    }

    public function update(PegawaiPendidikanUmumRequest $request, $id)
    {
        $pendidikan = PegawaiPendidikanUmum::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/pegawai/pendidikan-umum/" . $pendidikan->foto)) {
                File::delete("umum/pegawai/pendidikan-umum/" . $pendidikan->foto);
            }
            $file = $request->file('foto');
            $pendidikan->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pendidikan-umum'), $pendidikan->foto);
            $request['foto'] = $pendidikan->foto;
        }

        $input['foto'] = $pendidikan->foto;
        $pendidikan->update($input);
        Alert::success('Success', 'Update pegawai pendidikan umum has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $pendidikan = PegawaiPendidikanUmum::findOrFail($id);
        if (File::exists("umum/pegawai/pendidikan-umum/" . $pendidikan->foto)) {
            File::delete("umum/pegawai/pendidikan-umum/" . $pendidikan->foto);
        }

        $pendidikan->delete();

        Alert::error('Delete', 'Delete pegawai pendidikan umum has been successfully');
        return back();
    }
}