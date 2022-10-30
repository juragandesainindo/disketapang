<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\PegawaiOrtuRequest;
use App\Models\PegawaiOrtu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiOrtuController extends Controller
{
    public function store(PegawaiOrtuRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/ortu'), $imageName);
            $input['foto'] = $imageName;
        }

        PegawaiOrtu::create($input);

        Alert::success('Success', 'Create pegawai orang tua has been successfully');
        return back();
    }

    public function update(PegawaiOrtuRequest $request, $id)
    {
        $ortu = PegawaiOrtu::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/pegawai/ortu/" . $ortu->foto)) {
                File::delete("umum/pegawai/ortu/" . $ortu->foto);
            }
            $file = $request->file('foto');
            $ortu->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/ortu'), $ortu->foto);
            $request['foto'] = $ortu->foto;
        }

        $input['foto'] = $ortu->foto;
        $ortu->update($input);
        Alert::success('Success', 'Update pegawai orang tua has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $ortu = PegawaiOrtu::findOrFail($id);
        if (File::exists("umum/pegawai/ortu/" . $ortu->foto)) {
            File::delete("umum/pegawai/ortu/" . $ortu->foto);
        }

        $ortu->delete();

        Alert::error('Delete', 'Delete pegawai orang tua has been successfully');
        return back();
    }
}