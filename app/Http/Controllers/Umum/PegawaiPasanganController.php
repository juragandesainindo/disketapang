<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\PegawaiPasanganRequest;
use App\Models\PegawaiPasangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiPasanganController extends Controller
{
    public function store(PegawaiPasanganRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pasangan'), $imageName);
            $input['foto'] = $imageName;
        }

        PegawaiPasangan::create($input);

        Alert::success('Success', 'Create pegawai pasangan has been successfully');
        return back();
    }

    public function update(PegawaiPasanganRequest $request, $id)
    {
        $pasangan = PegawaiPasangan::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/pegawai/pasangan/" . $pasangan->foto)) {
                File::delete("umum/pegawai/pasangan/" . $pasangan->foto);
            }
            $file = $request->file('foto');
            $pasangan->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pasangan'), $pasangan->foto);
            $request['foto'] = $pasangan->foto;
        }

        $input['foto'] = $pasangan->foto;
        $pasangan->update($input);
        Alert::success('Success', 'Update pegawai pasangan has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $pasangan = PegawaiPasangan::findOrFail($id);
        if (File::exists("umum/pegawai/pasangan/" . $pasangan->foto)) {
            File::delete("umum/pegawai/pasangan/" . $pasangan->foto);
        }

        $pasangan->delete();

        Alert::error('Delete', 'Delete pegawai pasangan has been successfully');
        return back();
    }
}