<?php

namespace App\Http\Controllers\Umum\Asset\Perawatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\PerawatanAssetPegawaiRequest;
use App\Models\AssetUmum;
use App\Models\AssetUmumPegawai;
use App\Models\Pegawai;
use App\Models\PerawatanAssetPegawai;
use App\Models\PerawatanAssetUmum;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PerawatanKibBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $asset = AssetUmum::where('kategori', 'KibB')->get();
        foreach ($asset as $value) {
            $kodeBrg = $value->mappingAsset->kode_brg;
        }
        $pegawai = Pegawai::all();
        $filter = $request->get('search');
        if ($request->has('search')) {
            // $kibs = PerawatanAssetPegawai::whereHas('pegawai', function ($q) use ($filter) {
            //     $q->where('id', '=', $filter);
            // })->orderByDesc('id')->get();
            $kibs = PerawatanAssetPegawai::whereHas('assetUmumPegawai', function ($q) use ($filter) {
                $q->where('pegawai_id', '=', $filter);
            })->get();
        } else {
            $kibs = PerawatanAssetPegawai::all();
        }
        return view('umum.asset.perawatan-asset.kib-b.index', compact('kibs', 'kodeBrg', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assetPegawai = AssetUmumPegawai::all();
        return view('umum.asset.perawatan-asset.kib-b.create', compact('assetPegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerawatanAssetPegawaiRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/perawatan/kib-b'), $imageName);
            $input['foto'] = $imageName;
        }

        PerawatanAssetPegawai::create($input);

        Alert::success('Success', 'Create Perawatan Asset Kib B has been successfully');

        return redirect()->route('perawatan-asset-kib-b.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset = AssetUmum::where('kategori', 'KibB')->get();
        foreach ($asset as $value) {
            $kodeBrg = $value->mappingAsset->kode_brg;
        }

        $kib = PerawatanAssetPegawai::findOrFail($id);

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
        $pdf = PDF::loadView('umum.asset.perawatan-asset.kib-b.pdf', compact('kib', 'namakasubUmum', 'nipkasubUmum', 'kodeBrg'))
            ->setPaper('a4', 'landscape');
        $fileName = date(now());
        return $pdf->stream($fileName . ' Perawatan Asset KIB B.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kib = PerawatanAssetPegawai::findOrFail($id);
        $assetPegawai = AssetUmumPegawai::all();
        return view('umum.asset.perawatan-asset.kib-b.edit', compact('kib', 'assetPegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerawatanAssetPegawaiRequest $request, $id)
    {
        $kib = PerawatanAssetPegawai::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/asset/perawatan/kib-b/" . $kib->foto)) {
                File::delete("umum/asset/perawatan/kib-b/" . $kib->foto);
            }
            $file = $request->file('foto');
            $kib->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/perawatan/kib-b'), $kib->foto);
            $input['foto'] = $kib->foto;
        }

        $kib->update($input);

        Alert::success('Success', 'Update Perawatan Asset Kib B has been successfully');

        return redirect()->route('perawatan-asset-kib-b.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kib = PerawatanAssetPegawai::findOrFail($id);
        if (File::exists("umum/asset/perawatan/kib-b/" . $kib->foto)) {
            File::delete("umum/asset/perawatan/kib-b/" . $kib->foto);
        }

        PerawatanAssetPegawai::find($id)->delete();

        Alert::error('Delete', 'Delete Perawatan Asset Kib B has been successfully');

        return redirect()->route('perawatan-asset-kib-b.index');
    }
}