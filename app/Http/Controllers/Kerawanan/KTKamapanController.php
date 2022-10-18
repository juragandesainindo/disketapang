<?php

namespace App\Http\Controllers\Kerawanan;

use App\Http\Controllers\Controller;
use App\Models\CPCLKTKamapan;
use App\Models\SptCpcl;
use App\Models\VerifikasiCPCLKamapan;
use App\Models\Sk;
use App\Models\BeritaAcara;
use App\Models\BeritaAcaraShow;
use App\Models\KamapanDaftar;
use App\Models\KamapanDaftarBantuan;

use App\Models\BAKamapan;
use App\Models\ProposalKamapan;
use App\Models\DktKelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Elequent\Collection;
use App\Exports\BeritaAcaraExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;

class KTKamapanController extends Controller
{
    public function indexDaftar()
    {
        $edit = 1;
        $dkt = DktKelompok::all();
        $data = KamapanDaftar::orderBy('tanggal', 'desc')->get();
        return view('kerawanan.kt-kamapan.daftar.index', compact('edit', 'data', 'dkt'));
    }

    public function storeDaftar(Request $request)
    {
        $data = new KamapanDaftar([
            'dkt_kelompok_id'   => $request->dkt_kelompok_id,
            'tanggal'           => $request->tanggal
        ]);

        $data->save();

        return back()->with('success', 'Create Penerima Manfaat Successfully');
    }

    public function updateDaftar(Request $request, $id)
    {
        $data = KamapanDaftar::findOrFail($id);
        $data->update([
            'dkt_kelompok_id'   => $request->dkt_kelompok_id,
            'tanggal'           => $request->tanggal
        ]);

        return back()->with('success', 'Update Penerima Manfaat Successfully');
    }

    public function destroyDaftar($id)
    {
        KamapanDaftar::find($id)->delete();
        return back()->with('success', 'Delete Penerima Manfaat Successfully');
    }

    public function showDaftar($id)
    {
        $edit = 1;
        $data = KamapanDaftar::findOrFail($id);

        return view('kerawanan.kt-kamapan.daftar.show', compact('data', 'edit'));
    }

    public function storeDaftarBantuan(Request $request)
    {
        $data = new KamapanDaftarBantuan([
            'jenis_barang'  => $request->jenis_barang,
            'jumlah'  => $request->jumlah,
            'satuan'  => $request->satuan,
            'keterangan'  => $request->keterangan,
            'kamapan_daftar_id'  => $request->kamapan_daftar_id
        ]);
        $data->save();
        return back()->with('success', 'Create Daftar Bantuan successfully');
    }

    public function updateDaftarBantuan(Request $request, $id)
    {
        $data = KamapanDaftarBantuan::findOrFail($id);
        $data->update([
            'jenis_barang'  => $request->jenis_barang,
            'jumlah'  => $request->jumlah,
            'satuan'  => $request->satuan,
            'keterangan'  => $request->keterangan
        ]);
        return back()->with('success', 'Update Daftar Bantuan successfully');
    }

    public function destroyDaftarBantuan($id)
    {
        KamapanDaftarBantuan::find($id)->delete();
        return back()->with('success', 'Delete Daftar Bantuan successfully');
    }

    // PROPOSAL
    public function indexProposal()
    {
        $edit = 1;
        $dkt = DktKelompok::all();
        $data = ProposalKamapan::all();
        return view('kerawanan.kt-kamapan.proposal.index', compact('data', 'edit', 'dkt'));
    }

    public function storeProposal(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kerawanan/kt-kamapan/proposal'), $imageName);

            $data = new ProposalKamapan([
                'dkt_kelompok_id'    => $request->dkt_kelompok_id,
                'keterangan'    => $request->keterangan,
                'file'            => $imageName
            ]);

            $data->save();
        }

        return back()->with('success', 'Upload proposal kamapan successfully');
    }

    public function updateProposal(Request $request, $id)
    {
        $data = ProposalKamapan::findOrFail($id);
        if ($request->hasFile("file")) {
            if (File::exists("kerawanan/kt-kamapan/proposal/" . $data->file)) {
                File::delete("kerawanan/kt-kamapan/proposal/" . $data->file);
            }
            $file = $request->file("file");
            $data->file = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("kerawanan/kt-kamapan/proposal"), $data->file);
            $request['file'] = $data->file;
        }

        $data->update([
            'dkt_kelompok_id'    => $request->dkt_kelompok_id,
            'keterangan'    => $request->keterangan,
            'file'           => $data->file
        ]);

        return back()->with('success', 'Edit proposal kamapan successfully.');
    }

    public function destroyProposal($id)
    {
        $data = ProposalKamapan::findOrFail($id);
        if (File::exists('kerawanan/kt-kamapan/proposal/' . $data->file)) {
            File::delete('kerawanan/kt-kamapan/proposal/' . $data->file);
        }

        ProposalKamapan::find($id)->delete();

        return back()->with('success', 'Delete proposal kamapan successfully');
    }

    public function indexSptCpcl()
    {
        $edit = 1;
        $data = SptCpcl::orderBy('id', 'desc')->get();
        return view('kerawanan.kt-kamapan.spt-cpcl.index', compact('data', 'edit'));
    }

    public function storeSptCpcl(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kerawanan/kt-kamapan/spt-cpcl'), $imageName);

            $data = new SptCpcl([
                'title'            => $request->title,
                'file'            => $imageName
            ]);

            $data->save();
        }

        return back()->with('success', 'Upload spt cpcl successfully');
    }

    public function updateSptCpcl(Request $request, $id)
    {
        $data = SptCpcl::findOrFail($id);
        if ($request->hasFile("file")) {
            if (File::exists("kerawanan/kt-kamapan/spt-cpcl/" . $data->file)) {
                File::delete("kerawanan/kt-kamapan/spt-cpcl/" . $data->file);
            }
            $file = $request->file("file");
            $data->file = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("kerawanan/kt-kamapan/spt-cpcl"), $data->file);
            $request['file'] = $data->file;
        }

        $data->update([
            'title'    => $request->title,
            'file'              => $data->file
        ]);

        return back()->with('success', 'Edit spt cpcl successfully.');
    }

    public function destroySptCpcl($id)
    {
        $data = SptCpcl::findOrFail($id);
        if (File::exists('kerawanan/kt-kamapan/spt-cpcl/' . $data->file)) {
            File::delete('kerawanan/kt-kamapan/spt-cpcl/' . $data->file);
        }

        SptCpcl::find($id)->delete();

        return back()->with('success', 'Delete spt cpcl successfully');
    }



    public function indexVerifikasiCpcl()
    {
        $edit = 1;
        $data = ProposalKamapan::with('DktKelompok')->get();
        $verifikasi = VerifikasiCPCLKamapan::orderBy('id', 'desc')->get();
        return view('kerawanan.kt-kamapan.verifikasi-cpcl.index', compact('data', 'verifikasi', 'edit'));
    }

    public function storeVerifikasiCpcl(Request $request)
    {
        $data = new VerifikasiCPCLKamapan([
            'dkt_kelompok_id'    => $request->dkt_kelompok_id,
            'latar_belakang'    => $request->latar_belakang,
            'landasan_hukum'    => $request->landasan_hukum,
            'maksud'            => $request->maksud,
            'kegiatan'          => $request->kegiatan,
            'hasil'             => $request->hasil,
            'kesimpulan'        => $request->kesimpulan,
            'saran'             => $request->saran
        ]);
        $data->save();

        return back()->with('success', 'Create verifikasi cpcl successfully');
    }

    public function updateVerifikasiCpcl(Request $request, $id)
    {
        $data = VerifikasiCPCLKamapan::findOrFail($id);
        $data->update([
            'dkt_kelompok_id'    => $request->dkt_kelompok_id,
            'latar_belakang'    => $request->latar_belakang,
            'landasan_hukum'    => $request->landasan_hukum,
            'maksud'            => $request->maksud,
            'kegiatan'          => $request->kegiatan,
            'hasil'             => $request->hasil,
            'kesimpulan'        => $request->kesimpulan,
            'saran'             => $request->saran
        ]);
        return back()->with('success', 'Update verifikasi cpcl successfully');
    }

    public function exportVerifikasiCpcl($id)
    {
        $verifikasi = VerifikasiCPCLKamapan::findOrFail($id);
        return view('kerawanan.kt-kamapan.verifikasi-cpcl.export', compact('verifikasi'));
    }

    public function destroyVerifikasiCpcl($id)
    {
        $data = VerifikasiCPCLKamapan::findOrFail($id);

        VerifikasiCPCLKamapan::find($id)->delete();

        return back()->with('success', 'Delete verifikasi cpcl successfully');
    }

    public function indexSK()
    {
        $edit = 1;
        $data = Sk::orderBy('tanggal', 'desc')->get();
        return view('kerawanan.kt-kamapan.sk-penerima-manfaat.index', compact('data', 'edit'));
    }

    public function storeSK(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kerawanan/kt-kamapan/sk'), $imageName);

            $data = new Sk([
                'keterangan'    => $request->keterangan,
                'tanggal'        => $request->tanggal,
                'file'            => $imageName
            ]);

            $data->save();
        }

        return back()->with('success', 'Create SK Penerima Manfaat successfully');
    }

    public function updateSK(Request $request, $id)
    {
        $data = Sk::findOrFail($id);
        if ($request->hasFile("file")) {
            if (File::exists("kerawanan/kt-kamapan/sk/" . $data->file)) {
                File::delete("kerawanan/kt-kamapan/sk/" . $data->file);
            }
            $file = $request->file("file");
            $data->file = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("kerawanan/kt-kamapan/sk"), $data->file);
            $request['file'] = $data->file;
        }

        $data->update([
            'keterangan'    => $request->keterangan,
            'tanggal'        => $request->tanggal,
            'file'            => $data->file
        ]);

        return back()->with('success', 'Update SK Penerima Manfaat successfully');
    }

    public function destroySK($id)
    {
        $data = Sk::findOrFail($id);
        if (File::exists('kerawanan/kt-kamapan/sk/' . $data->file)) {
            File::delete('kerawanan/kt-kamapan/sk/' . $data->file);
        }
        Sk::find($id)->delete();

        return back()->with('success', 'Delete tahun successfully');
    }



    public function indexBA()
    {
        $edit = 1;
        $delete=1;
        $data = BeritaAcara::with('kamapanSk')->get();
        // dd($data);
        $sk = Sk::orderBy('tanggal', 'desc')->get();
        return view('kerawanan.kt-kamapan.berita-acara.index', compact('data', 'edit', 'sk','delete'));
    }

    public function storeBA(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kerawanan/kt-kamapan/berita-acara'), $imageName);

            $data = new BeritaAcara([
                'kamapan_sk_id' => $request->kamapan_sk_id,
                'file'        => $imageName
            ]);

            $data->save();
        }


        // $data = new BeritaAcara([
        //     'dkt_kelompok_id' => $request->dkt_kelompok_id,
        //     'pendahuluan' => $request->pendahuluan,
        //     'kesimpulan' => $request->kesimpulan,
        //     'tanggal'       => $request->tanggal
        // ]);
        // $data->save();

        return back()->with('success', 'Create berita acara successfully');
    }

    public function updateBA(Request $request, $id)
    {
        $data = BeritaAcara::findOrFail($id);
        if ($request->hasFile("file")) {
            if (File::exists("kerawanan/kt-kamapan/berita-acara/" . $data->file)) {
                File::delete("kerawanan/kt-kamapan/berita-acara/" . $data->file);
            }
            $file = $request->file("file");
            $data->file = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/kerawanan/kt-kamapan/berita-acara"), $data->file);
            $request['file'] = $data->file;
        }

        $data->update([
            'kamapan_sk_id' => $request->kamapan_sk_id,
                'file'        => $data->file
        ]);

        return back()->with('success', 'Update berita acara successfully');
    }

    public function printBA($id)
    {
        $data = BeritaAcara::findOrFail($id);

        return view('kerawanan.kt-kamapan.berita-acara.print', compact('data'));
    }

    public function showBA($id)
    {
        $edit = 1;
        $data = BeritaAcara::findOrFail($id);

        return view('kerawanan.kt-kamapan.berita-acara.show', compact('data', 'edit'));
    }

    public function destroyBA($id)
    {
        $data = BeritaAcara::findOrFail($id);
        if (File::exists("kerawanan/kt-kamapan/berita-acara/" . $data->file)) {
            File::delete("kerawanan/kt-kamapan/berita-acara/" . $data->file);
        }
        BeritaAcara::find($id)->delete();
        return back()->with('success', 'Delete berita acara successfully');
    }




    public function storeBAShow(Request $request)
    {
        $data = new BeritaAcaraShow([
            'jenis_barang' => $request->jenis_barang,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'keterangan' => $request->keterangan,
            'berita_acara_id' => $request->berita_acara_id
        ]);
        $data->save();

        return back()->with('success', 'Create bantuan successfully');
    }

    public function updateBAShow(Request $request, $id)
    {
        $data = BeritaAcaraShow::findOrFail($id);
        $data->update([
            'jenis_barang' => $request->jenis_barang,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success', 'Update bantuan successfully');
    }

    public function destroyBAShow($id)
    {
        $data = BeritaAcaraShow::findOrFail($id);
        BeritaAcaraShow::find($id)->delete();

        return back()->with('success', 'Delete bantuan successfully');
    }


    public function indexMonev()
    {
        $data = BeritaAcara::orderBy('tanggal', 'desc')->get();
        return view('kerawanan.kt-kamapan.monev.index', compact('data'));
    }

    public function excelMonev()
    {
        return Excel::download(new BeritaAcaraExport, 'berita-acara.xlsx');
    }
}