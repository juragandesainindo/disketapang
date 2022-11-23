<?php

namespace App\Http\Controllers\Umum\Asset;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\KibERequest;
use App\Models\AssetUmum;
use App\Models\MappingAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class KibEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kibs = AssetUmum::where('kategori', 'KibE')->where('penanggung_jawab', 'LIKE', '%' . $request->search . '%')
                ->orderByDesc('id')->get();
        } else {
            $kibs = AssetUmum::where('kategori', 'KibE')->orderByDesc('id')->get();
        }

        $totalNilaiBrg = $kibs->sum('nilai_brg');
        $totalNilaiTotal = $kibs->sum('nilai_perolehan');
        $totalNilaiSurut = $kibs->sum('nilai_surut');

        return view('umum.asset.kib-e.index', compact('kibs', 'totalNilaiBrg', 'totalNilaiTotal', 'totalNilaiSurut'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapping = MappingAsset::where('kategori', 'KibE')->get();
        return view('umum.asset.kib-e.create', compact('mapping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KibERequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-e'), $imageName);
            $input['foto'] = $imageName;
        }

        require_once 'StoreFormatUang.php';
        AssetUmum::create($input);

        Alert::success('Success', 'Create Kib E has been successfully.');

        return redirect()->route('kib-e.index');
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
        $mapping = MappingAsset::where('kategori', 'KibE')->get();
        return view('umum.asset.kib-e.edit', compact('kib', 'mapping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KibERequest $request, $id)
    {
        $kib = AssetUmum::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/asset/kib-e/" . $kib->foto)) {
                File::delete("umum/asset/kib-e/" . $kib->foto);
            }
            $file = $request->file('foto');
            $kib->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-e'), $kib->foto);
            $request['foto'] = $kib->foto;
        }

        require_once 'StoreFormatUang.php';
        $input['foto'] = $kib->foto;
        $kib->update($input);

        Alert::success('Success', 'Update Kib E has been successfully.');

        return redirect()->route('kib-e.index');
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
        if (File::exists("umum/asset/kib-e/" . $kib->foto)) {
            File::delete("umum/asset/kib-e/" . $kib->foto);
        }
        AssetUmum::find($id)->delete();

        Alert::error('Delete', 'Delete Kib E has been successfully.');

        return redirect()->route('kib-e.index');
    }
}