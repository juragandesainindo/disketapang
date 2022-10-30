<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\PegawaiPelatihanTeknisRequest;
use App\Models\PegawaiPelatihanTeknis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiPelatihanTeknisController extends Controller
{
    public function store(PegawaiPelatihanTeknisRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pelatihan-teknis'), $imageName);
            $input['foto'] = $imageName;
        }

        PegawaiPelatihanTeknis::create($input);

        Alert::success('Success', 'Create pegawai pelatihan teknis has been successfully');
        return back();
    }

    public function update(PegawaiPelatihanTeknisRequest $request, $id)
    {
        $teknis = PegawaiPelatihanTeknis::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/pegawai/pelatihan-teknis/" . $teknis->foto)) {
                File::delete("umum/pegawai/pelatihan-teknis/" . $teknis->foto);
            }
            $file = $request->file('foto');
            $teknis->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pelatihan-teknis'), $teknis->foto);
            $request['foto'] = $teknis->foto;
        }

        $input['foto'] = $teknis->foto;
        $teknis->update($input);
        Alert::success('Success', 'Update pegawai pelatihan teknis has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $teknis = PegawaiPelatihanTeknis::findOrFail($id);
        if (File::exists("umum/pegawai/pelatihan-teknis/" . $teknis->foto)) {
            File::delete("umum/pegawai/pelatihan-teknis/" . $teknis->foto);
        }

        $teknis->delete();

        Alert::error('Delete', 'Delete pegawai pelatihan teknis has been successfully');
        return back();
    }
}