<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Realisasi;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Exports\RealisasiExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class LaporanRealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post')) {
            $from = $req->input('from');
            if ($req->has('exportExcel')) {
                return Excel::download(new RealisasiExport($from), 'laporan-realisasi.xlsx');
            }
        } else {
            //select all
            $edit = 1;
            $delete = 1;
            $realisasi = Realisasi::orderBy('id', 'desc')->get();
            return view('keuangan.laporan-realisasi.index', compact('realisasi', 'edit', 'delete'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $realisasi = new Realisasi([
            'name_kegiatan' => $request->name_kegiatan,
        ]);

        $realisasi->save();

        return back()->with('success', 'Create kegiatan successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kegiatan = Kegiatan::orderBy('tahun', 'desc')->get();
        $realisasi = Realisasi::findOrFail($id);
        return view('keuangan.laporan-realisasi.show', compact('realisasi', 'kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $realisasi = Realisasi::findOrFail($id);
        $realisasi->update([
            'name_kegiatan' => $request->name_kegiatan,
        ]);

        return back()->with('success', 'Update kegiatan successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $realisasi = Realisasi::findOrFail($id);
        Realisasi::find($id)->delete();
        return back()->with('success', 'Delete kegiatan successfully');
    }

    public function storeKegiatan(Request $request)
    {
        $kegiatan = new Kegiatan([
            'nama_kegiatan' => $request->nama_kegiatan,
            'apbd_murni' => $request->apbd_murni,
            'refocusing' => $request->refocusing,
            'apbd_p' => $request->apbd_p,
            'realisasi_keuangan' => $request->realisasi_keuangan,
            'realisasi_fisik' => $request->realisasi_fisik,
            'seharusnya' => $request->seharusnya,
            'tahun' => $request->tahun,
            'defiasi' => $request->defiasi,
            'realisasi_id' => $request->realisasi_id,
        ]);

        $kegiatan->save();

        return back()->with('success', 'Create kegiatan successfully');
    }

    public function updateKegiatan(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'apbd_murni' => $request->apbd_murni,
            'refocusing' => $request->refocusing,
            'apbd_p' => $request->apbd_p,
            'realisasi_keuangan' => $request->realisasi_keuangan,
            'realisasi_fisik' => $request->realisasi_fisik,
            'seharusnya' => $request->seharusnya,
            'tahun' => $request->tahun,
            'defiasi' => $request->defiasi,
        ]);

        return back()->with('success', 'Update kegiatan successfully');
    }

    public function destroyKegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        Kegiatan::find($id)->delete();
        return back()->with('success', 'Delete kegiatan successfully');
    }
}
