<?php

namespace App\Http\Controllers\Konsumsi;

use App\Http\Controllers\Controller;
use App\Models\KwtKecamatan;
use App\Models\KwtKelurahan;
use App\Models\KwtKelompok;
use App\Models\KwtAnggota;
use App\Models\KwtKomoditi;
use Illuminate\Http\Request;
use App\Exports\KwtExport;
use Maatwebsite\Excel\Facades\Excel;

class KelompokWanitaTaniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edit = 1;
        $kwt = KwtKelompok::all();
        $data = KwtKecamatan::all();
        return view('konsumsi.kwt.index',compact('data','edit','kwt'));
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
        $data = new KwtKecamatan([
            'kecamatan'     => $request->kecamatan,
        ]);

        $data->save();

        return back()->with('success','Create kecamatan successfully');
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
        $data = KwtKecamatan::findOrFail($id);
        return view('konsumsi.kwt.kelurahan', compact('data','edit'));
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
        $data = KwtKecamatan::findOrFail($id);
        $data->update([
            'kecamatan'     => $request->kecamatan,
        ]);

        return back()->with('success','Update kecamatan successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KwtKecamatan::findOrFail($id);
        KwtKecamatan::find($id)->delete();
        return back()->with('success','Delete kecamatan successfully');
    }

    public function storeKelurahan(Request $request)
    {
        $kelurahan = new KwtKelurahan([
            'kelurahan'     => $request->kelurahan,
            'kwt_kecamatan_id'     => $request->kwt_kecamatan_id,
        ]);

        $kelurahan->save();

        return back()->with('success','Create Kelurahan successfully');
    }

    public function showKelurahan($id)
    {
        $edit = 1;
        $data = KwtKelurahan::findOrFail($id);
        return view('konsumsi.kwt.kelompok', compact('data','edit'));
    }

    public function updateKelurahan(Request $request, $id)
    {
        $data = KwtKelurahan::findOrFail($id);
        $data->update([
            'kelurahan'     => $request->kelurahan,
        ]);

        return back()->with('success','Update Kelurahan successfully');
    }

    public function destroyKelurahan($id)
    {
        $data = KwtKelurahan::findOrFail($id);
        KwtKelurahan::find($id)->delete();

        return back()->with('success','Delete Kelurahan successfully');
    }

    public function storeKelompok(Request $request)
    {
        $data = new KwtKelompok([
            'nama_kwt'          => $request->nama_kwt,
            'ketua'             => $request->ketua,
            'telepon'           => $request->telepon,
            'ppl'               => $request->ppl,
            'alamat'            => $request->alamat,
            'link'              => $request->link,
            'luas_lahan'        => $request->luas_lahan,
            'status'            => $request->status,
            'kwt_kelurahan_id'  => $request->kwt_kelurahan_id,
            'kwt_kecamatan_id'  => $request->kwt_kecamatan_id
        ]);

        $data->save();

        return back()->with('success','Create kelompok kelurahan successfully');
    }

    public function showKelompok($id)
    {
        $edit = 1;
        $data = KwtKelompok::findOrFail($id);
        return view('konsumsi.kwt.anggota', compact('data','edit'));
    }

    public function updateKelompok(Request $request, $id)
    {
        $data = KwtKelompok::findOrFail($id);
        $data->update([
            'nama_kwt'          => $request->nama_kwt,
            'ketua'             => $request->ketua,
            'telepon'           => $request->telepon,
            'ppl'               => $request->ppl,
            'alamat'            => $request->alamat,
            'link'              => $request->link,
            'luas_lahan'        => $request->luas_lahan,
            'status'            => $request->status
        ]);

        return back()->with('success','Update kelompok kelurahan successfully');
    }

    public function destroyKelompok($id)
    {
        $data = KwtKelompok::findOrFail($id);
        KwtKelompok::find($id)->delete();

        return back()->with('success','Delete kelompok kelurahan successfully');
    }
    
    
    public function indexKomoditi($id)
    {
        $edit=1;
        $data = KwtKelompok::findOrFail($id);
        return view('konsumsi.kwt.komoditi', compact('data','edit'));
    }
    
    public function storeKomoditi(Request $request)
    {
        $data = new KwtKomoditi([
            'komoditi'  => $request->komoditi,
            'produksi'  => $request->produksi,
            'kwt_kelompok_id'   => $request->kwt_kelompok_id
        ]);
        
        $data->save();
        
        return back()->with('success', 'Upload komoditi successfully');
    }
    
    public function updateKomoditi(Request $request,$id)
    {
        $data = KwtKomoditi::findOrFail($id);
        $data->update([
            'komoditi'  => $request->komoditi,
            'produksi'  => $request->produksi,
        ]);
        
        return back()->with('success', 'Update komoditi successfully');
    }
    
    public function destroyKomoditi($id)
    {
        $data = KwtKomoditi::findOrFail($id);
        KwtKomoditi::find($id)->delete();
        
        return back()->with('success', 'Delete komoditi successfully');
    }
    
    
    

    public function storeAnggota(Request $request)
    {
        $data = new KwtAnggota([
            'nama_anggota'      => $request->nama_anggota,
            'ktp'               => $request->ktp,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'telepon'         => $request->telepon,
            'kwt_kelompok_id'   => $request->kwt_kelompok_id
        ]);

        $data->save();

        return back()->with('success','Create anggota kelompok successfully');
    }

    public function updateAnggota(Request $request, $id)
    {
        $data = KwtAnggota::findOrFail($id);
        $data->update([
            'nama_anggota'      => $request->nama_anggota,
            'ktp'               => $request->ktp,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'telepon'         => $request->telepon,
        ]);

        return back()->with('success','Update anggota kelompok successfully');
    }

    public function destroyAnggota($id)
    {
        $data = KwtAnggota::findOrFail($id);
        KwtAnggota::find($id)->delete();

        return back()->with('success','Delete anggota kelompok successfully');
    }
    
    public function export()
    {
        return Excel::download(new KwtExport, 'Kelompok Wanita Tani.xlsx');
    }
}
