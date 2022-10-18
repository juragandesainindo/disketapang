<?php

namespace App\Http\Controllers\Distribusi;

use App\Http\Controllers\Controller;
use App\Models\CadanganPangan;
use App\Models\Stok;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Exports\CadanganPanganExport;
use Maatwebsite\Excel\Facades\Excel;

class CadanganPanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edit = 1;
        $cadangan = CadanganPangan::orderBy('created_at','desc')->get();
        return view('distribusi.cadangan-pangan.index',compact('cadangan','edit'));
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
        $cadangan = new CadanganPangan([
            'pedagang' => $request->pedagang,
            'alamat' => $request->alamat,
            'link' => $request->link,
        ]);

        $cadangan->save();
        return back()->with('success','Create pedagang successfully');
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
        $cadangan = CadanganPangan::findOrFail($id);
        
        return view('distribusi.cadangan-pangan.show',compact('cadangan','edit'));
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
        $cadangan = CadanganPangan::findOrFail($id);
        $cadangan->update([
            'pedagang' => $request->pedagang,
            'alamat' => $request->alamat,
            'link' => $request->link,
        ]);

        return back()->with('success','Update pedagang successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cadangan = CadanganPangan::findOrFail($id);
        CadanganPangan::find($id)->delete();
        return back()->with('success','Delete pedagang successfully');
    }

    public function storeStok(Request $request)
    {
        $stok = new Stok([
            'komoditi' => $request->komoditi,
            'stok_awal' => $request->stok_awal,
            'stok_akhir' => $request->stok_akhir,
            'satuan' => $request->satuan,
            'tanggal' => $request->tanggal,
            'cadangan_pangan_id' => $request->cadangan_pangan_id
        ]);

        $stok->save();

        return back()->with('success','Create stok komoditi pangan successfully');
    }

    public function updateStok(Request $request, $id)
    {
        $stok = Stok::findOrFail($id);
        $stok->update([
            'komoditi' => $request->komoditi,
            'stok_awal' => $request->stok_awal,
            'stok_akhir' => $request->stok_akhir,
            'satuan' => $request->satuan,
            'tanggal' => $request->tanggal,
        ]);

        return back()->with('success','Update stok komoditi pangan successfully');
    }

    public function destroyStok($id)
    {
        Stok::find($id)->delete();
        return back()->with('success','Delete stok komoditi pangan successfully');
    }
    
    public function excel(Request $req)
    {
        if ($req->isMethod('post'))
        {
            $from = $req->input('from');
            $to   = $req->input('to');
            if($req->has('exportExcel'))
            {
                return Excel::download(new CadanganPanganExport($from, $to), 'cadangan-pangan.xlsx');
            }
        }
    }
}
