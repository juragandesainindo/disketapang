<?php

namespace App\Http\Controllers\Umum\Asset;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\KibARequest;
use App\Models\AssetUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class KibAController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kibs = AssetUmum::where('kategori', '=', 'KibA')
                ->where('penanggung_jawab', 'LIKE', '%' . $request->search . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $kibs = AssetUmum::where('kategori', '=', 'KibA')->orderBy('created_at', 'desc')->get();
        }
        return view('umum.asset.kib-a.index', compact('kibs'));
    }

    public function create()
    {
        return view('umum.asset.kib-a.create');
    }

    public function store(KibARequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-a'), $imageName);
            $input['foto'] = $imageName;
        }

        AssetUmum::create($input);
        // toast('Create Kib A has been successfully', 'error');

        Alert::success('Success', 'Create Kib A has been successfully');

        return redirect()->route('kib-a.index');
        // ->with('success', 'Create Kib A has been successfully')
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kib = AssetUmum::findOrFail($id);
        return view('umum.asset.kib-a.edit', compact('kib'));
    }

    public function update(KibARequest $request, $id)
    {
        $kib = AssetUmum::findOrFail($id);

        if ($request->hasFile('foto')) {
            if (File::exists("umum/asset/kib-a/" . $kib->foto)) {
                File::delete("umum/asset/kib-a/" . $kib->foto);
            }
            $file = $request->file('foto');
            $kib->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-a'), $kib->foto);
            $request['foto'] = $kib->foto;
        }

        $kib->update([
            'id_brg' => $request->id_brg,
            'kode_brg' => $request->kode_brg,
            'nama_brg' => $request->nama_brg,
            'tgl_perolehan' => $request->tgl_perolehan,
            'nilai_brg' => $request->nilai_brg,
            'nilai_perolehan' => $request->nilai_perolehan,
            'nilai_surut' => $request->nilai_surut,
            'penggunaan' => $request->penggunaan,
            'keterangan' => $request->keterangan,
            'sertifikat' => $request->sertifikat,
            'jenis_sertifikat' => $request->jenis_sertifikat,
            'luas' => $request->luas,
            'alamat' => $request->alamat,
            'penanggung_jawab' => $request->penanggung_jawab,
            'foto' => $kib->foto,
            'kategori' => $request->kategori,
        ]);

        Alert::success('Success', 'Update Kib A has been successfully');

        return redirect()->route('kib-a.index');
    }

    public function destroy($id)
    {

        $kib = AssetUmum::findOrFail($id);
        if (File::exists("umum/asset/kib-a/" . $kib->foto)) {
            File::delete("umum/asset/kib-a/" . $kib->foto);
        }
        AssetUmum::find($id)->delete();

        Alert::error('Delete', 'Delete Kib A has been successfully');
        // toast('Your Post as been submited!', 'success');

        return redirect()->route('kib-a.index');
        // ->with('success', 'Delete Kib A has been successfully')
    }
}