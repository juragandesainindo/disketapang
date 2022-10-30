<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\PegawaiAnakRequest;
use App\Models\PegawaiAnak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiAnakController extends Controller
{
    public function store(PegawaiAnakRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/anak'), $imageName);
            $input['foto'] = $imageName;
        }

        PegawaiAnak::create($input);

        Alert::success('Success', 'Create pegawai anak has been successfully');
        return back();
    }

    public function update(PegawaiAnakRequest $request, $id)
    {
        $anak = PegawaiAnak::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/pegawai/anak/" . $anak->foto)) {
                File::delete("umum/pegawai/anak/" . $anak->foto);
            }
            $file = $request->file('foto');
            $anak->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/anak'), $anak->foto);
            $request['foto'] = $anak->foto;
        }

        $input['foto'] = $anak->foto;
        $anak->update($input);
        Alert::success('Success', 'Update pegawai anak has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $anak = PegawaiAnak::findOrFail($id);
        if (File::exists("umum/pegawai/anak/" . $anak->foto)) {
            File::delete("umum/pegawai/anak/" . $anak->foto);
        }

        $anak->delete();

        Alert::error('Delete', 'Delete pegawai anak has been successfully');
        return back();
    }
}