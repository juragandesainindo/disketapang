<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\PegawaiJabatanRequest;
use App\Models\PegawaiJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiJabatanController extends Controller
{
    public function store(PegawaiJabatanRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/jabatan'), $imageName);
            $input['foto'] = $imageName;
        }

        PegawaiJabatan::create($input);

        Alert::success('Success', 'Create pegawai jabatan has been successfully');
        return back();
    }

    public function update(PegawaiJabatanRequest $request, $id)
    {
        $jabatan = PegawaiJabatan::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/pegawai/jabatan/" . $jabatan->foto)) {
                File::delete("umum/pegawai/jabatan/" . $jabatan->foto);
            }
            $file = $request->file('foto');
            $jabatan->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/jabatan'), $jabatan->foto);
            $request['foto'] = $jabatan->foto;
        }

        $input['foto'] = $jabatan->foto;
        $jabatan->update($input);
        Alert::success('Success', 'Update pegawai jabatan has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $jabatan = PegawaiJabatan::findOrFail($id);
        if (File::exists("umum/pegawai/jabatan/" . $jabatan->foto)) {
            File::delete("umum/pegawai/jabatan/" . $jabatan->foto);
        }

        $jabatan->delete();

        Alert::error('Delete', 'Delete pegawai jabatan has been successfully');
        return back();
    }
}