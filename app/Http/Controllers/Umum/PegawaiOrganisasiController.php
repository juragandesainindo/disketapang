<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\PegawaiOrganisasiRequest;
use App\Models\PegawaiOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiOrganisasiController extends Controller
{
    public function store(PegawaiOrganisasiRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/organisasi'), $imageName);
            $input['foto'] = $imageName;
        }

        PegawaiOrganisasi::create($input);

        Alert::success('Success', 'Create pegawai organisasi has been successfully');
        return back();
    }

    public function update(PegawaiOrganisasiRequest $request, $id)
    {
        $organisasi = PegawaiOrganisasi::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/pegawai/organisasi/" . $organisasi->foto)) {
                File::delete("umum/pegawai/organisasi/" . $organisasi->foto);
            }
            $file = $request->file('foto');
            $organisasi->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/organisasi'), $organisasi->foto);
            $request['foto'] = $organisasi->foto;
        }

        $input['foto'] = $organisasi->foto;
        $organisasi->update($input);
        Alert::success('Success', 'Update pegawai organisasi has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $organisasi = PegawaiOrganisasi::findOrFail($id);
        if (File::exists("umum/pegawai/organisasi/" . $organisasi->foto)) {
            File::delete("umum/pegawai/organisasi/" . $organisasi->foto);
        }

        $organisasi->delete();

        Alert::error('Delete', 'Delete pegawai organisasi has been successfully');
        return back();
    }
}