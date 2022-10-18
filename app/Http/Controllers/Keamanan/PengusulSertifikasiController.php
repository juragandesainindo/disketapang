<?php

namespace App\Http\Controllers\Keamanan;

use App\Http\Controllers\Controller;
use App\Models\PengusulSertifikasi;
use App\Models\DktKelompok;
use Illuminate\Http\Request;

class PengusulSertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edit = 1;
        $dkt = DktKelompok::all();
        $data = PengusulSertifikasi::with('DktKelompok')->get();
        return view('keamanan.pengusul-sertifikasi.index', compact('data','dkt','edit'));
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
        $data = new PengusulSertifikasi([
            'dkt_kelompok_id'   => $request->dkt_kelompok_id
            ]);
            
        $data->save();
        return back()->with('success', 'Create pengusul sertifikasi successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data = PengusulSertifikasi::findOrFail($id);
        $data->update([
            'dkt_kelompok_id'   => $request->dkt_kelompok_id
            ]);
            
        return back()->with('success', 'Update pengusul sertifikasi successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PengusulSertifikasi::findOrFail($id);
        PengusulSertifikasi::find($id)->delete();
        return back()->with('success', 'Delete pengusul sertifikasi successfully');
    }
}
