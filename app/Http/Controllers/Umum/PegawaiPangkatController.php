<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\PegawaiPangkatRequest;
use App\Models\PegawaiPangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiPangkatController extends Controller
{
    public function store(PegawaiPangkatRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pangkat'), $imageName);
            $input['foto'] = $imageName;
        }

        PegawaiPangkat::create($input);

        Alert::success('Success', 'Create pegawai pangkat has been successfully');
        return back();
    }

    public function update(PegawaiPangkatRequest $request, $id)
    {
        $pangkat = PegawaiPangkat::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/pegawai/pangkat/" . $pangkat->foto)) {
                File::delete("umum/pegawai/pangkat/" . $pangkat->foto);
            }
            $file = $request->file('foto');
            $pangkat->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pangkat'), $pangkat->foto);
            $request['foto'] = $pangkat->foto;
        }

        $input['foto'] = $pangkat->foto;
        $pangkat->update($input);
        Alert::success('Success', 'Update pegawai pangkat has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $pangkat = PegawaiPangkat::findOrFail($id);
        if (File::exists("umum/pegawai/pangkat/" . $pangkat->foto)) {
            File::delete("umum/pegawai/pangkat/" . $pangkat->foto);
        }

        $pangkat->delete();

        Alert::error('Delete', 'Delete pegawai pangkat has been successfully');
        return back();
    }
}
