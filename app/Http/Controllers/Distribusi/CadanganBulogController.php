<?php

namespace App\Http\Controllers\Distribusi;

use App\Http\Controllers\Controller;
use App\Models\CadanganBulog;
use Illuminate\Http\Request;

class CadanganBulogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edit = 1;
        $data = CadanganBulog::orderBy('tgl_belanja','desc')->get();
        return view('distribusi.cadangan-bulog.index', compact('data','edit'));
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
        $data = new CadanganBulog([
            'pengadaan'     => $request->pengadaan,
            'stok'     => $request->stok,
            'tgl_stok'     => $request->tgl_stok,
            'belanja'     => $request->belanja,
            'tgl_belanja'     => $request->tgl_belanja,
            'keterangan'     => $request->keterangan,
            'satuan'     => $request->satuan,
        ]);

        $data->save();

        return back()->with('success','Create cadangan bulog successfully');
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
        $data = CadanganBulog::findOrFail($id);
        $data->update([
            'pengadaan'     => $request->pengadaan,
            'stok'     => $request->stok,
            'tgl_stok'     => $request->tgl_stok,
            'belanja'     => $request->belanja,
            'tgl_belanja'     => $request->tgl_belanja,
            'keterangan'     => $request->keterangan,
            'satuan'     => $request->satuan,
        ]);

        return back()->with('success','Update cadangan bulog successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CadanganBulog::findOrFail($id);
        CadanganBulog::find($id)->delete();
        
        return back()->with('success','Delete cadangan bulog successfully');
    }
}
