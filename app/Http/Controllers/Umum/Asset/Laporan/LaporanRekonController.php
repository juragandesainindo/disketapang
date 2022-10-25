<?php

namespace App\Http\Controllers\Umum\Asset\Laporan;

use App\Http\Controllers\Controller;
use App\Models\AssetUmum;
use App\Models\Jabatan;
use App\Models\LaporanRekon;
use App\Models\Pegawai;
use App\Models\PegawaiPangkat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;
use PhpOffice\PhpWord\TemplateProcessor;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanRekonController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('search');
        if ($request->has('search')) {
            $laporans = LaporanRekon::whereHas('assetUmum', function ($q) use ($filter) {
                $q->where('kategori', '=', $filter);
            })->orderByDesc('created_at')->get();
        } else {
            $laporans = LaporanRekon::orderByDesc('created_at')->get();
        }
        return view('umum.asset.laporan.rekon.index', compact('laporans'));
    }

    public function create()
    {
        $AWAL = 'LR';
        // $monthnow = date('m', time());
        $yearnow = date('Y', time());
        // dd($monthnow);
        // karna array dimulai dari 0 maka kita tambah di awal data kosong
        // bisa juga mulai dari "1"=>"I"
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $noUrutAkhir = LaporanRekon::whereYear('created_at', '=', $yearnow)->max('no_surat');
        // $noUrutAkhir = LaporanRekon::max('no_surat');
        // dd($noUrutAkhir);
        $no = 1;
        if ($noUrutAkhir) {
            // echo "No urut surat di database : " . $noUrutAkhir;
            // echo "<br>";
            $no_surat = sprintf("%02s", abs($noUrutAkhir + 1));
            $kode_surat = sprintf("%02s", abs($noUrutAkhir + 1)) . '/' . $AWAL . '/' . $bulanRomawi[date('n')] . '/' . date('Y');
        } else {
            // echo "No urut surat di database : 0";
            // echo "<br>";
            $no_surat =  sprintf("%02s", $no);
            $kode_surat =  sprintf("%02s", $no) . '/' . $AWAL . '/' . $bulanRomawi[date('n')] . '/' . date('Y');
        }
        // dd($no_surat);

        $assets = AssetUmum::orderBy('kategori', 'asc')->get();
        $pegawais = Pegawai::orderBy('nama', 'asc')->get();
        return view('umum.asset.laporan.rekon.create', compact('assets', 'pegawais', 'no_surat', 'kode_surat'));
    }

    public function getPangkat(Request $request)
    {
        $pangkat = PegawaiPangkat::where('pegawai_id', $request->pegawai_id)->orderByDesc('tmt_pangkat')->take(1)->get();
        if (count($pangkat) > 0) {
            return response()->json($pangkat);
        }
    }

    public function getJabatan(Request $request)
    {
        $jabatan = Jabatan::where('pegawai_id', $request->pegawai_id)->orderByDesc('tmt_jabatan')->take(1)->get();
        if (count($jabatan) > 0) {
            return response()->json($jabatan);
        }
    }

    public function store(Request $request)
    {
        LaporanRekon::create([
            'asset_umum_id' => $request->asset_umum_id,
            'pegawai_id' => $request->pegawai_id,
            'no_surat' => $request->no_surat,
            'kode_surat' => $request->kode_surat,
        ]);
        Alert::success('Success', 'Create laporan rekon has been successfully');

        return redirect()->route('laporan-rekon.index');
    }

    public function show($id)
    {
        $laporan = LaporanRekon::findOrFail($id);

        $hari = Carbon::parse(now())->isoFormat('dddd');
        $tgl = Carbon::parse(now())->isoFormat('DD');
        $bulan = Carbon::parse(now())->isoFormat('MMMM');
        $tahun = Carbon::parse(now())->isoFormat('Y');
        // dd();

        if ($laporan->pegawai->pangkat->count() > 0) {
            foreach ($laporan->pegawai->pangkat->sortByDesc('tgl_sk')->take(1) as  $item) {
                $pangkat = $item->nama_pangkat;
            }
        } else {
            $pangkat = '-';
        }
        // dd($pangkat);
        if ($laporan->pegawai->jabatan->count() > 0) {
            foreach ($laporan->pegawai->jabatan->sortByDesc('tmt_jabatan')->take(1) as  $j) {
                $jabatan = $j->nama_jabatan;
            }
        } else {
            $jabatan = '-';
        }
        // dd($jabatan);
        return view('umum.asset.laporan.rekon.show', compact('laporan', 'pangkat', 'jabatan', 'hari', 'tgl', 'bulan', 'tahun'));
    }

    public function edit($id)
    {
        $laporan = LaporanRekon::findOrFail($id);
        $assets = AssetUmum::orderBy('kategori', 'asc')->get();
        $pegawais = Pegawai::orderBy('nama', 'asc')->get();

        if ($laporan->pegawai->pangkat->count() > 0) {
            foreach ($laporan->pegawai->pangkat->sortByDesc('tgl_sk')->take(1) as  $item) {
                $pangkat = $item->nama_pangkat;
            }
        } else {
            $pangkat = '-';
        }
        // dd($pangkat);
        if ($laporan->pegawai->jabatan->count() > 0) {
            foreach ($laporan->pegawai->jabatan->sortByDesc('tmt_jabatan')->take(1) as  $j) {
                $jabatan = $j->nama_jabatan;
            }
        } else {
            $jabatan = '-';
        }

        return view('umum.asset.laporan.rekon.edit', compact('laporan', 'assets', 'pegawais', 'pangkat', 'jabatan'));
    }

    public function update(Request $request, $id)
    {
        $laporan = LaporanRekon::findOrFail($id);
        $laporan->update([
            'asset_umum_id' => $request->asset_umum_id,
            'pegawai_id' => $request->pegawai_id,
        ]);
        Alert::success('Success', 'Update laporan rekon has been successfully');

        return redirect()->route('laporan-rekon.index');
    }

    public function exportRekon($id)
    {
        $laporan = LaporanRekon::findOrFail($id);

        $noSurat = $laporan->kode_surat;
        // dd($noSurat);

        $hari = Carbon::parse(now())->isoFormat('dddd');
        $tgl = Carbon::parse(now())->isoFormat('DD');
        $bulan = Carbon::parse(now())->isoFormat('MMMM');
        $tahun = Carbon::parse(now())->isoFormat('Y');

        // Pangkat
        if ($laporan->pegawai->pangkat->count() > 0) {
            foreach ($laporan->pegawai->pangkat->sortByDesc('tgl_sk')->take(1) as  $item) {
                $pangkat = $item->nama_pangkat;
            }
        } else {
            $pangkat = '-';
        }

        // Jabatan
        if ($laporan->pegawai->jabatan->count() > 0) {
            foreach ($laporan->pegawai->jabatan->sortByDesc('tmt_jabatan')->take(1) as  $j) {
                $jabatan = $j->nama_jabatan;
            }
        } else {
            $jabatan = '-';
        }


        $templateProcessor = new TemplateProcessor('word-template/laporan-rekon.docx');
        $templateProcessor->setValue('noSurat', $noSurat);
        $templateProcessor->setValue('hari', $hari);
        $templateProcessor->setValue('tgl', $tgl);
        $templateProcessor->setValue('bulan', $bulan);
        $templateProcessor->setValue('tahun', $tahun);
        $templateProcessor->setValue('nama', $laporan->pegawai->nama);
        $templateProcessor->setValue('nip', $laporan->pegawai->nip);
        $templateProcessor->setValue('pangkat', $pangkat);
        $templateProcessor->setValue('jabatan', $jabatan);
        $templateProcessor->setValue('idBrg', $laporan->assetUmum->id_brg);
        $templateProcessor->setValue('kodeBrg', $laporan->assetUmum->kode_brg);
        $templateProcessor->setValue('namaBrg', $laporan->assetUmum->nama_brg);
        $templateProcessor->setValue('keterangan', $laporan->assetUmum->keterangan);
        $templateProcessor->setValue('tglPerolehan', $laporan->assetUmum->tgl_perolehan);
        $templateProcessor->setValue('nilaiBrg', $laporan->assetUmum->nilai_brg);
        $fileName = $laporan->pegawai->nama;
        $templateProcessor->saveAs('Laporan Rekon ' . $fileName . '.docx');
        return response()->download('Laporan Rekon ' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
}