<?php

namespace App\Http\Controllers\Umum\Asset;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\KibBAssetPegawaiRequest;
use App\Http\Requests\umum\asset\KibBRequest;
use App\Models\AssetUmum;
use App\Models\AssetUmumPegawai;
use App\Models\MappingAsset;
use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade as PDF;
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
        // dd($total);
        $totalNilaiBrg = $kibs->sum('nilai_brg');
        $totalNilaiSurut = $kibs->sum('nilai_surut');
        $totalNilaiTotal = $kibs->sum('nilai_perolehan');

        return view('umum.asset.kib-b.index', compact('kibs', 'totalNilaiBrg', 'totalNilaiTotal', 'totalNilaiSurut'));
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

        foreach ($request->addmore as $key => $value) {
            $pegawai = ++$key;
        }

        require_once 'StoreFormatUangKibB.php';

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-b'), $imageName);
            $input['foto'] = $imageName;
        }

        $save = AssetUmum::create($input);
        foreach ($request->addmore as $key => $value) {
            $value['asset_umum_id'] = $save->id;
            AssetUmumPegawai::create($value);
        }


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
        $asset = AssetUmum::findOrFail($id);
        $kadis = Pegawai::all();
        $jabatanKadis = "";
        $namaKadis = "";
        $nipKadis = "";
        foreach ($kadis as $kad) {
            foreach ($kad->pegawaiJabatan->where('nama_jabatan', 'Kepala Dinas Ketahanan Pangan kota Pekanbaru') as $val) {
                if ($kad->pegawaiJabatan->count() > 0) {
                    $jabatanKadis = $val->nama_jabatan;
                    $namaKadis = $kad->nama;
                    $nipKadis = $kad->nip;
                } else {
                }
            }
        }

        return view('umum.asset.kib-b.show', compact('asset', 'jabatanKadis', 'namaKadis', 'nipKadis'));
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
        $perolehan = $kib->nilai_brg * $kib->assetUmumPegawai->count() - $kib->nilai_surut;
        return view('umum.asset.kib-b.edit', compact('kib', 'mapping', 'pegawai', 'perolehan'));
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

        if ($request->addmore) {
            foreach ($request->addmore as $key => $value) {
                $pegawai = +$key;
            }
            foreach ($kib->assetUmumPegawai as $key => $value) {
                $pegawai2 = ++$key;
            }
            $pegawais = $pegawai + $pegawai2;

            include_once 'StoreFormatUangKibB.php';
            // $input['nilai_perolehan'] = $request->nilai_brg * $pegawais - $request->nilai_surut;
        } else {
            foreach ($kib->assetUmumPegawai as $key => $value) {
                $pegawai = ++$key;
            }
            include_once 'StoreFormatUangKibB.php';
            // $input['nilai_perolehan'] = $request->nilai_brg * $pegawai - $request->nilai_surut;
        }
        // dd($pegawai);

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

        if ($request->addmore) {
            foreach ($request->addmore as $key => $value) {
                $value['asset_umum_id'] = $kib->id;
                AssetUmumPegawai::create($value);
            }
        }

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

    public function updatePemakai(KibBAssetPegawaiRequest $request, $id)
    {
        $kib = AssetUmumPegawai::findOrFail($id);
        $input = $request->validated();
        $kib->update($input);

        Alert::success('Success', 'Update pegawai pemakai has been successfully');
        return back();
    }

    public function deletePemakai($id)
    {
        AssetUmumPegawai::find($id)->delete();
        Alert::error('Delete', 'Delete pegawai pemakai has been successfully');
        return back();
    }













    public function skpbPdf(Request $request)
    {
        $asset = AssetUmum::where('penggunaan', '=', 'Kendaraan')->get();
        $kadis = Pegawai::all();
        $namaKadis = "";
        $nipKadis = "";
        foreach ($kadis as $kad) {
            foreach ($kad->pegawaiJabatan->where('nama_jabatan', 'Kepala Dinas Ketahanan Pangan kota Pekanbaru') as $val) {
                if ($kad->pegawaiJabatan->count() > 0) {
                    $namaKadis = $kad->nama;
                    $nipKadis = $kad->nip;
                } else {
                }
            }
        }
        $pdf = PDF::loadView('umum.asset.kib-b.skpb.pdf', compact('asset', 'namaKadis', 'nipKadis'))
            ->setPaper('a4', 'landscape');
        $fileName = date(now());
        return $pdf->stream($fileName . '.pdf');
    }

    public function skpbLainnyaPreview()
    {
        $asset = AssetUmum::where('penggunaan', '=', 'Lainnya')->orderBy('tgl_perolehan', 'desc')->get();
        $kadis = Pegawai::all();
        $namaKadis = "";
        $nipKadis = "";
        foreach ($kadis as $kad) {
            foreach ($kad->pegawaiJabatan->where('nama_jabatan', 'Kepala Dinas Ketahanan Pangan kota Pekanbaru') as $val) {
                if ($kad->pegawaiJabatan->count() > 0) {
                    $namaKadis = $kad->nama;
                    $nipKadis = $kad->nip;
                } else {
                }
            }
        }
        return view('umum.asset.kib-b.skpb.preview', compact('asset', 'namaKadis', 'nipKadis'));
    }

    public function skpbLainnyaPdf(Request $request)
    {
        $asset = AssetUmum::where('penggunaan', '=', 'Lainnya')->orderBy('tgl_perolehan', 'desc')->get();
        $kadis = Pegawai::all();
        $namaKadis = "";
        $nipKadis = "";
        foreach ($kadis as $kad) {
            foreach ($kad->pegawaiJabatan->where('nama_jabatan', 'Kepala Dinas Ketahanan Pangan kota Pekanbaru') as $val) {
                if ($kad->pegawaiJabatan->count() > 0) {
                    $namaKadis = $kad->nama;
                    $nipKadis = $kad->nip;
                } else {
                }
            }
        }
        $pdf = PDF::loadView('umum.asset.kib-b.skpb.lainnya-pdf', compact('asset', 'namaKadis', 'nipKadis'))
            ->setPaper('a4', 'potrait');
        $fileName = date(now());
        return $pdf->stream($fileName . '.pdf');
    }
}