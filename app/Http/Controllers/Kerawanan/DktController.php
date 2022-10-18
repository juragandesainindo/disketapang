<?php

namespace App\Http\Controllers\Kerawanan;

use App\Http\Controllers\Controller;
use App\Models\DktAnggota;
use App\Models\DktKecamatan;
use App\Models\DktKelurahan;
use App\Models\DktKelompok;
use Illuminate\Http\Request;
use DB;
use App\Exports\DktExport;
use Maatwebsite\Excel\Facades\Excel;

class DktController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edit = 1;
        $kelurahan = DktKelurahan::all();
        $kelompok = DktKelompok::orderBy('nama_dkt','asc')->get();
        $dkt = DktKecamatan::orderBy('id','desc')->get();
        return view('kerawanan.dkt.index',compact('dkt','edit','kelurahan','kelompok'));
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
        $dkt = new DktKecamatan ([
            'kecamatan' => $request->kecamatan
        ]);

        $dkt->save();
        return back()->with('success','Created kecamatan kelompok tani successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edit = 1;
        $dkt = DktKecamatan::findOrFail($id);
        return view('kerawanan.dkt.show',compact('dkt','edit'));
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
        $dkt = DktKecamatan::findOrFail($id);

        $dkt->update([
            'kecamatan' => $request->kecamatan
        ]);

        return back()->with('success','Edit kecamatan successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dkt = DktKecamatan::findOrFail($id);

        DktKecamatan::find($id)->delete();

        return back()->with('success', 'Delete kecamatan successfully');
    }
    
    public function export()
    {
        return Excel::download(new DktExport, 'data-kelompok-tani.xlsx');
    }

    public function storeKelurahan(Request $request)
    {
        $kelurahan = new DktKelurahan ([
            'kelurahan' => $request->kelurahan,
            'dkt_kecamatan_id'    => $request->dkt_kecamatan_id
        ]);

        $kelurahan->save();

        return back()->with('success','Create kelurahan successfully');
    }

    public function showKelurahan($id)
    {
        $edit = 1;
        $kelurahan = DktKelurahan::findOrFail($id);
        return view('kerawanan.dkt.kelurahan',compact('kelurahan','edit'));
    }

    public function updateKelurahan(Request $request, $id)
    {
        $kelurahan = DktKelurahan::findOrFail($id);

        $kelurahan->update([
            'kelurahan' => $request->kelurahan
        ]);

        return back()->with('success','Edit kelurahan successfully');
    }

    public function destroyKelurahan($id)
    {
        $kelurahan = DktKelurahan::findOrFail($id);

        DktKelurahan::find($id)->delete();

        return back()->with('success','Delete kelurahan successfully');
    }

    public function storeKelompok(Request $request)
    {
        $kelompok = new DktKelompok ([
            'nama_dkt'           => $request->nama_dkt,
            'alamat'             => $request->alamat,
            'link'               => $request->link,
            'ketua'              => $request->ketua,
            'telepon'            => $request->telepon,
            'ppl'                => $request->ppl,
            'status'             => $request->status,
            'dkt_kelurahan_id'   => $request->dkt_kelurahan_id,
            'dkt_kecamatan_id'   => $request->dkt_kecamatan_id
        ]);

        $kelompok->save();

        return back()->with('success','Create kelompok tani successfully');
    }

    public function showKelompok($id)
    {
        $edit = 1;
        $kelompok = DktKelompok::findOrFail($id);
        return view('kerawanan.dkt.anggota', compact('kelompok','edit'));
    }

    public function updateKelompok(Request $request, $id)
    {
        $kelompok = DktKelompok::findOrFail($id);
        $kelompok->update([
            'nama_dkt'          => $request->nama_dkt,
            'alamat'            => $request->alamat,
            'link'              => $request->link,
            'ketua'             => $request->ketua,
            'telepon'           => $request->telepon,
            'ppl'               => $request->ppl,
            'status'            => $request->status,
            'dkt_kelurahan_id'  => $request->dkt_kelurahan_id,
            'dkt_kecamatan_id'  => $request->dkt_kecamatan_id
        ]);

        return back()->with('success','Edit kelompok tani successfully');
    }

    public function destroyKelompok($id)
    {
        $kelompok = DktKelompok::findOrFail($id);
        DktKelompok::find($id)->delete();

        return back()->with('success','Delete kelompok tani successfully');
    }






    public function storeAnggota(Request $request)
    {
        $anggota = new DktAnggota([
        'nama_anggota'                      => $request->nama_anggota,
        'ktp'                               => $request->ktp,
        'jenis_kelamin'                     => $request->jenis_kelamin,
        'komoditas'                         => $request->komoditas,
        'volume'                            => $request->volume,
        'dkt_kelompok_id'             => $request->dkt_kelompok_id
        ]);

        $anggota->save();

        return back()->with('success','Created anggota successfully');
    }
    
    public function updateAnggota(Request $request, $id)
    {
        $anggota = DktAnggota::findOrFail($id);
        $anggota->update([
        'nama_anggota'                      => $request->nama_anggota,
        'ktp'                               => $request->ktp,
        'jenis_kelamin'                     => $request->jenis_kelamin,
        'komoditas'                         => $request->komoditas,
        'volume'                            => $request->volume
        ]);

        return back()->with('success','Update anggota successfully');
    }
    
    public function destroyAnggota($id)
    {
        $anggota = DktAnggota::findOrFail($id);
        DktAnggota::find($id)->delete();

        return back()->with('success','Delete anggota successfully');
    }
    
    public function cari($id)
    {
        $edit = 1;
        $cari = DktKelompok::where('id')->get();
        return view('kerawanan.dkt.cari',compact('cari','edit'));
    }
}
