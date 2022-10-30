<?php

namespace App\Http\Controllers\Umum\Asset\Laporan;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\LaporanRekonStoreRequest;
use App\Http\Requests\umum\LaporanRekonUpdateRequest;
use App\Models\AssetUmum;
use App\Models\LaporanRekon;
use App\Models\Pegawai;
use App\Models\PegawaiJabatan;
use App\Models\PegawaiPangkat;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

    public function getPegawai(Request $request)
    {
        $pegawai = Pegawai::where('nip', $request->nip)->get();
        if (count($pegawai) > 0) {
            return response()->json($pegawai);
        }
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
        $jabatan = PegawaiJabatan::where('pegawai_id', $request->pegawai_id)->orderByDesc('tmt_jabatan')->take(1)->get();
        if (count($jabatan) > 0) {
            return response()->json($jabatan);
        }
    }

    public function store(LaporanRekonStoreRequest $request)
    {
        $input = $request->validated();
        LaporanRekon::create($input);
        Alert::success('Success', 'Create laporan rekon has been successfully');
        return redirect()->route('laporan-rekon.index');
    }

    public function edit($id)
    {
        $laporan = LaporanRekon::findOrFail($id);
        $assets = AssetUmum::orderBy('kategori', 'asc')->get();
        $pegawais = Pegawai::orderBy('nama', 'asc')->get();

        if ($laporan->pegawai->pegawaiPangkat->count() > 0) {
            foreach ($laporan->pegawai->pegawaiPangkat->sortByDesc('tgl_sk')->take(1) as  $item) {
                $pangkat = $item->nama_pangkat;
            }
        } else {
            $pangkat = '-';
        }
        // dd($pangkat);
        if ($laporan->pegawai->pegawaiJabatan->count() > 0) {
            foreach ($laporan->pegawai->pegawaiJabatan->sortByDesc('tmt_jabatan')->take(1) as  $j) {
                $jabatan = $j->nama_jabatan;
            }
        } else {
            $jabatan = '-';
        }

        return view('umum.asset.laporan.rekon.edit', compact('laporan', 'assets', 'pegawais', 'pangkat', 'jabatan'));
    }

    public function update(LaporanRekonUpdateRequest $request, $id)
    {
        $laporan = LaporanRekon::findOrFail($id);
        $input = $request->validated();
        $laporan->update($input);
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
        if ($laporan->pegawai->pegawaiPangkat->count() > 0) {
            foreach ($laporan->pegawai->pegawaiPangkat->sortByDesc('tgl_sk')->take(1) as  $item) {
                $pangkat = $item->nama_pangkat;
            }
        } else {
            $pangkat = '-';
        }
        // dd($pangkat);
        // Jabatan
        if ($laporan->pegawai->pegawaiJabatan->count() > 0) {
            foreach ($laporan->pegawai->pegawaiJabatan->sortByDesc('tmt_jabatan')->take(1) as  $j) {
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

        $templateProcessor->setValue('namaPengurus', $laporan->pegawai->nama);
        $templateProcessor->setValue('nipPengurus', $laporan->pegawai->nip);
        $templateProcessor->setValue('pangkatPengurus', $pangkat);
        $templateProcessor->setValue('jabatanPengurus', $jabatan);
        $templateProcessor->setValue('namaKasubagUmum', $laporan->kasubag_nama);
        $templateProcessor->setValue('nipKasubagUmum', $laporan->kasubag_nip);
        $templateProcessor->setValue('namaSKPD', $laporan->nama_skpd);
        $templateProcessor->setValue('nipSKPD', $laporan->nip_skpd);
        $templateProcessor->setValue('pangkatSKPD', $laporan->pangkat_skpd);
        $templateProcessor->setValue('jabatanSKPD', $laporan->jabatan_skpd);
        $templateProcessor->setValue('namaKSKPD', $laporan->nama_kepala_skpd);
        $templateProcessor->setValue('nipKSKPD', $laporan->nip_kepala_skpd);

        $templateProcessor->setValue('kodeBrg', $laporan->assetUmum->mappingAsset->kode_brg);
        $templateProcessor->setValue('namaBrg', $laporan->assetUmum->mappingAsset->nama_brg);
        $templateProcessor->setValue('keterangan', $laporan->assetUmum->mappingAsset->keterangan);
        $templateProcessor->setValue('tglPerolehan', Carbon::parse($laporan->assetUmum->tgl_perolehan)->isoFormat('DD MMMM Y'));
        $templateProcessor->setValue('nilaiBrg', number_format($laporan->assetUmum->nilai_brg));
        $templateProcessor->setValue('kodeBelanja', $laporan->kode_belanja);
        $templateProcessor->setValue('namaPenyedia', $laporan->nama_penyedia);
        $templateProcessor->setValue('uraianBelanja', $laporan->uraian_belanja);
        $fileName = $laporan->pegawai->nama;
        $templateProcessor->saveAs('Laporan Rekon ' . $fileName . '.docx');
        return response()->download('Laporan Rekon ' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
}