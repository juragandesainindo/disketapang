<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\PegawaiPenghargaanRequest;
use App\Models\PegawaiPenghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiPenghargaanController extends Controller
{
    public function store(PegawaiPenghargaanRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/penghargaan'), $imageName);
            $input['foto'] = $imageName;
        }

        PegawaiPenghargaan::create($input);

        Alert::success('Success', 'Create pegawai penghargaan has been successfully');
        return back();
    }

    public function update(PegawaiPenghargaanRequest $request, $id)
    {
        $penghargaan = PegawaiPenghargaan::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/pegawai/penghargaan/" . $penghargaan->foto)) {
                File::delete("umum/pegawai/penghargaan/" . $penghargaan->foto);
            }
            $file = $request->file('foto');
            $penghargaan->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/penghargaan'), $penghargaan->foto);
            $request['foto'] = $penghargaan->foto;
        }

        $input['foto'] = $penghargaan->foto;
        $penghargaan->update($input);
        Alert::success('Success', 'Update pegawai penghargaan has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $penghargaan = PegawaiPenghargaan::findOrFail($id);
        if (File::exists("umum/pegawai/penghargaan/" . $penghargaan->foto)) {
            File::delete("umum/pegawai/penghargaan/" . $penghargaan->foto);
        }

        $penghargaan->delete();

        Alert::error('Delete', 'Delete pegawai penghargaan has been successfully');
        return back();
    }
}