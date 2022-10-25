<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\PegawaiPelatihanKepemimpinanRequest;
use App\Models\PegawaiPelatihanKepemimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiPelatihanKepemimpinanController extends Controller
{
    public function store(PegawaiPelatihanKepemimpinanRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pelatihan-kepemimpinan'), $imageName);
            $input['foto'] = $imageName;
        }

        PegawaiPelatihanKepemimpinan::create($input);

        Alert::success('Success', 'Create pegawai pelatihan kepemimpinan has been successfully');
        return back();
    }

    public function update(PegawaiPelatihanKepemimpinanRequest $request, $id)
    {
        $pelatihan = PegawaiPelatihanKepemimpinan::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/pegawai/pelatihan-kepemimpinan/" . $pelatihan->foto)) {
                File::delete("umum/pegawai/pelatihan-kepemimpinan/" . $pelatihan->foto);
            }
            $file = $request->file('foto');
            $pelatihan->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pelatihan-kepemimpinan'), $pelatihan->foto);
            $request['foto'] = $pelatihan->foto;
        }

        $input['foto'] = $pelatihan->foto;
        $pelatihan->update($input);
        Alert::success('Success', 'Update pegawai pelatihan kepemimpinan has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $pelatihan = PegawaiPelatihanKepemimpinan::findOrFail($id);
        if (File::exists("umum/pegawai/pelatihan-kepemimpinan/" . $pelatihan->foto)) {
            File::delete("umum/pegawai/pelatihan-kepemimpinan/" . $pelatihan->foto);
        }

        $pelatihan->delete();

        Alert::error('Delete', 'Delete pegawai pelatihan kepemimpinan has been successfully');
        return back();
    }
}