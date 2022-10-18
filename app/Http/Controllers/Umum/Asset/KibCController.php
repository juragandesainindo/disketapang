<?php

namespace App\Http\Controllers\Umum\Asset;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\KibCRequest;
use App\Models\AssetUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class KibCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kibs = AssetUmum::where('kategori', 'KibC')->where('penanggung_jawab', 'LIKE', '%' . $request->search . '%')
                ->orderByDesc('id')->get();
        } else {
            $kibs = AssetUmum::where('kategori', 'KibC')->orderByDesc('id')->get();
        }
        return view('umum.asset.kib-c.index', compact('kibs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('umum.asset.kib-c.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KibCRequest $request)
    {
        $input = $request->validated();
        // dd($input);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-c'), $imageName);
            $input['foto'] = $imageName;
        }

        AssetUmum::create($input);

        Alert::success('Success', 'Create Kib C has been successfully.');

        return redirect()->route('kib-c.index');
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
        $kib = AssetUmum::findOrFail($id);
        return view('umum.asset.kib-c.edit', compact('kib'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KibCRequest $request, $id)
    {
        $kib = AssetUmum::findOrFail($id);

        if ($request->hasFile('foto')) {
            if (File::exists("umum/asset/kib-c/" . $kib->foto)) {
                File::delete("umum/asset/kib-c/" . $kib->foto);
            }
            $file = $request->file('foto');
            $kib->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-c'), $kib->foto);
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
            'penanggung_jawab' => $request->penanggung_jawab,
            'luas' => $request->luas,
            'kontruksi' => $request->kontruksi,
            'tingkat' => $request->tingkat,
            'imb' => $request->imb,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'masa_manfaat' => $request->masa_manfaat,
            'sisa_manfaat' => $request->sisa_manfaat,
            'kategori' => $request->kategori,
            'foto' => $kib->foto,
        ]);

        Alert::success('Success', 'Update Kib C has been successfully.');

        return redirect()->route('kib-c.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kib = AssetUmum::findOrFail($id);
        if (File::exists("umum/asset/kib-c/" . $kib->foto)) {
            File::delete("umum/asset/kib-c/" . $kib->foto);
        }
        AssetUmum::find($id)->delete();

        Alert::error('Delete', 'Delete Kib C has been successfully.');

        return redirect()->route('kib-c.index');
    }
}