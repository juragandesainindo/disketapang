<?php

namespace App\Http\Controllers\Umum\Asset;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\KibBRequest;
use App\Models\AssetUmum;
use App\Models\MappingAsset;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class KibBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kibs = AssetUmum::where('kategori', 'KibB')->where('penanggung_jawab', 'LIKE', '%' . $request->search . '%')
                ->orderByDesc('id')->get();
        } else {
            $kibs = AssetUmum::where('kategori', 'KibB')->orderByDesc('id')->get();
            foreach ($kibs as $item) {
                $pemakai = $item->pemakai;
            }
            dd(implode("<br />", $pemakai));
        }
        return view('umum.asset.kib-b.index', compact('kibs', 'pemakai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        $mapping = MappingAsset::where('kategori', 'KibB')->get();
        return view('umum.asset.kib-b.create', compact('pegawai', 'mapping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KibBRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-b'), $imageName);
            $input['foto'] = $imageName;
        }

        $pemakai = $input['pemakai'];
        $input['pemakai'] = implode(',\n', $pemakai);

        AssetUmum::create($input);

        Alert::success('Success', 'Create Kib B has been successfully.');

        return redirect()->route('kib-b.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kib = AssetUmum::findOrFail($id);
        dd($kib);

        return view('umum.asset.kib-b.show', compact('kib'));
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
        return view('umum.asset.kib-b.edit', compact('kib'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KibBRequest $request, $id)
    {
        $kib = AssetUmum::findOrFail($id);

        if ($request->hasFile('foto')) {
            if (File::exists("umum/asset/kib-b/" . $kib->foto)) {
                File::delete("umum/asset/kib-b/" . $kib->foto);
            }
            $file = $request->file('foto');
            $kib->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-b'), $kib->foto);
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
            'merk_type' => $request->merk_type,
            'nopol' => $request->nopol,
            'ukuran' => $request->ukuran,
            'bahan_warna' => $request->bahan_warna,
            'spesifikasi' => $request->spesifikasi,
            'no_pabrik' => $request->no_pabrik,
            'no_rangka' => $request->no_rangka,
            'no_mesin' => $request->no_mesin,
            'bpkb' => $request->bpkb,
            'stnk' => $request->stnk,
            'masa_manfaat' => $request->masa_manfaat,
            'sisa_manfaat' => $request->sisa_manfaat,
            'kategori' => $request->kategori,
            'foto' => $kib->foto,
        ]);

        Alert::success('Success', 'Update Kib B has been successfully.');

        return redirect()->route('kib-b.index');
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
        if (File::exists("umum/asset/kib-b/" . $kib->foto)) {
            File::delete("umum/asset/kib-b/" . $kib->foto);
        }
        AssetUmum::find($id)->delete();

        Alert::error('Delete', 'Delete Kib B has been successfully');

        return redirect()->route('kib-b.index');
    }
}