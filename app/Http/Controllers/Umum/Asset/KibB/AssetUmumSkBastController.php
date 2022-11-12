<?php

namespace App\Http\Controllers\umum\asset\KibB;

use App\Http\Controllers\Controller;
use App\Models\AssetUmum;
use App\Models\AssetUmumSkBast;
use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AssetUmumSkBastController extends Controller
{
    public function preview()
    {
        $asset = AssetUmum::orderBy('tgl_perolehan', 'desc')->get();
        $kadis = Pegawai::all();
        $skPreview = AssetUmumSkBast::all();
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
        return view('umum.asset.kib-b.skBast.preview', compact('asset', 'skPreview', 'namaKadis', 'nipKadis'));
    }

    public function store(Request $request)
    {
        AssetUmumSkBast::create([
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
        ]);
        Alert::success('Success', 'Create keterangan SK pemakai barang successfully');
        return back();
    }
    public function update(Request $request, $id)
    {
        $preview = AssetUmumSkBast::findOrFail($id);
        $preview->update([
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
        ]);
        Alert::success('Success', 'Update keterangan SK pemakai barang successfully');
        return back();
    }
    public function destroy($id)
    {
        $preview = AssetUmumSkBast::findOrFail($id);
        $preview->delete();
        Alert::error('Delete', 'Delete keterangan SK pemakai barang successfully');
        return back();
    }

    public function pdfKendaraan()
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
        $pdf = PDF::loadView('umum.asset.kib-b.skBast.pdfKendaraan', compact('asset', 'namaKadis', 'nipKadis'))
            ->setPaper('a4', 'landscape');
        $fileName = date(now());
        return $pdf->stream($fileName . '.pdf');
    }

    public function pdfLainnya()
    {
        $asset = AssetUmum::where('penggunaan', '=', 'Lainnya')->orderBy('tgl_perolehan', 'desc')->get();
        $kadis = Pegawai::all();
        $skPreview = AssetUmumSkBast::all();
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
        $pdf = PDF::loadView('umum.asset.kib-b.skBast.pdfLainnya', compact('asset', 'skPreview', 'namaKadis', 'nipKadis'))
            ->setPaper('a4', 'potrait');
        $fileName = date(now());
        return $pdf->stream($fileName . '.pdf');
    }
}