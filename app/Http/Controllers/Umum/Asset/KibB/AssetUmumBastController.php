<?php

namespace App\Http\Controllers\umum\asset\kibb;

use App\Http\Controllers\Controller;
use App\Models\AssetUmum;
use App\Models\AssetUmumBast;
use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AssetUmumBastController extends Controller
{
    public function store(Request $request)
    {
        AssetUmumBast::create([
            'asset_umum_id' => $request->asset_umum_id,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
        ]);
        Alert::success('Success', 'Create keterangan serah terima pemakai barang has been successfully');
        return back();
    }

    public function update(Request $request, $id)
    {
        $bast = AssetUmumBast::findOrFail($id);
        $bast->update([
            'keterangan' => $request->keterangan,
        ]);
        Alert::success('Success', 'Update keterangan serah terima pemakai barang has been successfully');
        return back();
    }

    public function destroy($id)
    {
        $bast = AssetUmumBast::findOrFail($id);
        $bast->delete();
        Alert::error('Delete', 'Delete keterangan serah terima pemakai barang has been successfully');
        return back();
    }

    public function pdf(Request $request, $id)
    {
        $asset = AssetUmum::findOrFail($id);
        $kadis = Pegawai::with('PegawaiJabatan')->get();
        $jabatanKadis = "-";
        $namaKadis = "-";
        $nipKadis = "-";
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
        $pdf = PDF::loadView('umum.asset.kib-b.modalBast.pdf', compact('asset', 'jabatanKadis', 'namaKadis', 'nipKadis'))
            ->setPaper('a4', 'potrait');
        $fileName = date(now());
        return $pdf->stream($fileName . '.pdf');
    }
}