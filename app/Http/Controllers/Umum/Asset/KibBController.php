<?php

namespace App\Http\Controllers\Umum\Asset;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\KibBRequest;
use App\Models\AssetUmum;
use App\Models\AssetUmumPegawai;
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
        }
        return view('umum.asset.kib-b.index', compact('kibs'));
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



        $save = AssetUmum::create($input);
        $save->pegawai()->attach($request->input('pegawai_id'));

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
        // dd($kib);

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
        $mapping = MappingAsset::where('kategori', 'KibB')->get();
        $pegawai = Pegawai::all();

        // dd($pegawai);
        $pegawai = Pegawai::all();
        return view('umum.asset.kib-b.edit', compact('kib', 'mapping', 'pegawai'));
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

        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/asset/kib-b/" . $kib->foto)) {
                File::delete("umum/asset/kib-b/" . $kib->foto);
            }
            $file = $request->file('foto');
            $kib->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-b'), $kib->foto);
            $request['foto'] = $kib->foto;
        }
        $input['foto'] = $kib->foto;

        $kib->update($input);

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
        $kib = AssetUmum::find($id)->delete();
        Alert::error('Delete', 'Delete Kib B has been successfully');

        return redirect()->route('kib-b.index');
    }

    public function updatePegawai(Request $request, $id)
    {
        $kib = AssetUmum::findOrFail($id);
        $kib->pegawai()->attach($request->input('pegawai_id'));
        return back()->with('success', 'Tambah pemakai berhasil');
    }

    public function deletePegawai($id)
    {
        AssetUmumPegawai::find($id)->delete();
        // dd($pegawai);
        return back()->with('success', 'Hapus pemakai berhasil');
    }
}