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
        $data = PengusulSertifikasi::with('DktKelompok')->get();
        return view('keamanan.pengusul-sertifikasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dkt = DktKelompok::all();
        return view('keamanan.pengusul-sertifikasi.create', compact('dkt'));
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
        return redirect()->route('pengusul-sertifikasi.index')->with('success', 'Create pengusul sertifikasi successfully');
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
        $data = PengusulSertifikasi::findOrFail($id);
        $dkt = DktKelompok::all();
        return view('keamanan.pengusul-sertifikasi.edit', compact('data', 'dkt'));
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

        return redirect()->route('pengusul-sertifikasi.index')->with('success', 'Update pengusul sertifikasi successfully');
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