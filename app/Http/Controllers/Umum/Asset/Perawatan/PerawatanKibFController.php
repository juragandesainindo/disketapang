<?php

namespace App\Http\Controllers\Umum\Asset\Perawatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\PerawatanAssetRequest;
use App\Models\AssetUmum;
use App\Models\Pegawai;
use App\Models\PerawatanAssetUmum;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PerawatanKibFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->get('search');
        if ($request->has('search')) {
            $kibs = PerawatanAssetUmum::whereHas('assetUmum', function ($q) use ($filter) {
                $q->where('kategori', 'KibF')->where('penanggung_jawab', '=', $filter);
            })->orderByDesc('id')->get();
        } else {
            $kibs = PerawatanAssetUmum::whereHas('assetUmum', function ($q) {
                $q->where('kategori', 'KibF');
            })->orderByDesc('id')->get();
        }
        return view('umum.asset.perawatan-asset.kib-f.index', compact('kibs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kibs = AssetUmum::where('kategori', 'KibF')->get();
        return view('umum.asset.perawatan-asset.kib-f.create', compact('kibs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerawatanAssetRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/perawatan/kib-f'), $imageName);
            $input['foto'] = $imageName;
        }

        PerawatanAssetUmum::create($input);
        Alert::success('Success', 'Create Perawatan Asset Kib F has been successfully');

        return redirect()->route('perawatan-asset-kib-f.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kib = PerawatanAssetUmum::findOrFail($id);

        $kasubUmum = Pegawai::all();
        $namakasubUmum = "";
        $nipkasubUmum = "";
        foreach ($kasubUmum as $kad) {
            foreach ($kad->pegawaiJabatan->where('nama_jabatan', 'Kasubbag Umum') as $val) {
                if ($kad->pegawaiJabatan->count() > 0) {
                    $namakasubUmum = $kad->nama;
                    $nipkasubUmum = $kad->nip;
                } else {
                }
            }
        }
        // dd($namakasubUmum);
        // dd($kib);
        $pdf = PDF::loadView('umum.asset.perawatan-asset.kib-f.pdf', compact('kib', 'namakasubUmum', 'nipkasubUmum'))
            ->setPaper('a4', 'landscape');
        $fileName = date(now());
        return $pdf->stream($fileName . ' Perawatan Asset KIB F.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kib = PerawatanAssetUmum::findOrFail($id);
        $modelKib = AssetUmum::where('kategori', 'KibF')->get();
        return view('umum.asset.perawatan-asset.kib-f.edit', compact('kib', 'modelKib'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerawatanAssetRequest $request, $id)
    {
        $kib = PerawatanAssetUmum::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/asset/perawatan/kib-f/" . $kib->foto)) {
                File::delete("umum/asset/perawatan/kib-f/" . $kib->foto);
            }
            $file = $request->file('foto');
            $kib->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/perawatan/kib-f'), $kib->foto);
            $request['foto'] = $kib->foto;
        }

        $input['foto'] = $kib->foto;

        $kib->update($input);
        Alert::success('Success', 'Update Perawatan Asset Kib F has been successfully');

        return redirect()->route('perawatan-asset-kib-f.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kib = PerawatanAssetUmum::findOrFail($id);
        if (File::exists("umum/asset/perawatan/kib-f/" . $kib->foto)) {
            File::delete("umum/asset/perawatan/kib-f/" . $kib->foto);
        }
        PerawatanAssetUmum::findOrFail($id)->delete();
        Alert::error('Delete', 'Delete Perawatan Asset Kib F has been successfully');

        return redirect()->route('perawatan-asset-kib-f.index');
    }
}