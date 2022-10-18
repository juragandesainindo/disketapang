<?php

namespace App\Http\Controllers\Umum\Asset;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\AtbRequest;
use App\Models\AssetUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AtbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $atbs = AssetUmum::where('kategori', 'Atb')->where('penanggung_jawab', 'LIKE', '%' . $request->search . '%')
                ->orderByDesc('id')->get();
        } else {
            $atbs = AssetUmum::where('kategori', 'Atb')->orderByDesc('id')->get();
        }
        return view('umum.asset.atb.index', compact('atbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('umum.asset.atb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtbRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/atb'), $imageName);
            $input['foto'] = $imageName;
        }

        AssetUmum::create($input);

        Alert::success('Success', 'Create Asset tak berwujud has been successfully.');

        return redirect()->route('asset-tak-berwujud.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atb = AssetUmum::findOrFail($id);
        return view('umum.asset.atb.edit', compact('atb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtbRequest $request, $id)
    {
        $atb = AssetUmum::findOrFail($id);

        if ($request->hasFile('foto')) {
            if (File::exists("umum/asset/atb/" . $atb->foto)) {
                File::delete("umum/asset/atb/" . $atb->foto);
            }
            $file = $request->file('foto');
            $atb->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/atb'), $atb->foto);
            $request['foto'] = $atb->foto;
        }

        $atb->update([
            'id_brg' => $request->id_brg,
            'kode_brg' => $request->kode_brg,
            'nama_brg' => $request->nama_brg,
            'tgl_perolehan' => $request->tgl_perolehan,
            'nilai_brg' => $request->nilai_brg,
            'nilai_perolehan' => $request->nilai_perolehan,
            'nilai_surut' => $request->nilai_surut,
            'penggunaan' => $request->penggunaan,
            'keterangan' => $request->keterangan,
            'penanggung_jawab' => $request->penanggung_jawab,
            'instansi_developer' => $request->instansi_developer,
            'nama_developer' => $request->nama_developer,
            'kontak_developer' => $request->kontak_developer,
            'kategori' => $request->kategori,
            'foto' => $atb->foto,
        ]);

        Alert::success('Success', 'Update Asset tak berwujud has been successfully.');

        return redirect()->route('asset-tak-berwujud.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atb = AssetUmum::findOrFail($id);
        if (File::exists("umum/asset/atb/" . $atb->foto)) {
            File::delete("umum/asset/atb/" . $atb->foto);
        }
        AssetUmum::find($id)->delete();

        Alert::error('Delete', 'Delete Asset tak berwujud has been successfully.');

        return redirect()->route('asset-tak-berwujud.index');
    }
}