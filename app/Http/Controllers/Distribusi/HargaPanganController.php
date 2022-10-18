<?php

namespace App\Http\Controllers\Distribusi;

use App\Http\Controllers\Controller;
use App\Models\HargaPangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HargaPanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        // $method = $req->method();

        // if ($req->isMethod('post')) {
        //     $from = $req->input('from');
        //     $to   = $req->input('to');
        //     $nama_pasar   = $req->input('nama_pasar');
        //     if ($req->has('search')) {
        //         $edit = 1;
        //         $data = DB::select("SELECT * FROM harga_pangan WHERE tanggal BETWEEN '$from' AND '$to'");
        //         return view('distribusi.harga-pangan.index', compact('data', 'edit'));
        //     } elseif ($req->has('exportExcel')) {

        //         return Excel::download(new HargaPanganExport($from, $to, $nama_pasar), 'harga-pangan.xlsx');
        //     }
        // } else {
        //     $edit = 1;
        //     $data = HargaPangan::orderBy('tanggal', 'desc')->orderBy('nama_pasar', 'ASC')->get();
        //     return view('distribusi.harga-pangan.index', compact('data', 'edit'));
        // }

        $edit = 1;
        $delete = 1;
        $data = HargaPangan::orderBy('id', 'desc')->get();
        return view('distribusi.harga-pangan.index', compact('data', 'edit', 'delete'));
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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('distribusi/harga-pangan'), $imageName);

            $data = new HargaPangan([
                'keterangan'    => $request->keterangan,
                'file'    => $imageName,
            ]);

            $data->save();
        }

        return back()->with('success', 'Create harga pangan successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $edit = 1;
        // $komoditas = KomoditasHargaPangan::findOrFail($id);
        // return view('distribusi.harga-pangan.show', compact('komoditas', 'edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $data = HargaPangan::findOrFail($id);

        if ($request->hasFile('file')) {
            if (File::exists('distribusi/harga-pangan/' . $data->file)) {
                File::delete('distribusi/harga-pangan/' . $data->file);
            }
            $file = $request->file('file');
            $data->file = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('distribusi/harga-pangan'), $data->file);
            $request['file'] = $data->file;
        }

        $data->update([
            'keterangan'       => $request->keterangan,
            'file'        => $data->file
        ]);

        return back()->with('success', 'Update harga pangan successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = HargaPangan::findOrFail($id);

        if (File::exists("distribusi/harga-pangan/" . $data->file)) {
            File::delete("distribusi/harga-pangan/" . $data->file);
        }
        HargaPangan::find($id)->delete();

        return back()->with('success', 'Delete harga pangan successfully');
    }
}