<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LaporanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edit = 1;
        $lk = LaporanKeuangan::orderBy('updated_at','desc')->paginate(9);
        return view('keuangan.laporan-keuangan.index',compact('edit','lk'));
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
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('keuangan/laporan-keuangan'),$imageName);

            $lk = new LaporanKeuangan ([
                'title' => $request->title,
                'file'  => $imageName
            ]);

            $lk->save();
        }

        return redirect()->route('laporan-keuangan.index')->with('success','Create laporan keuangan successfully');
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
        $lk = LaporanKeuangan::findOrFail($id);

        if ($request->hasFile('file')) {
            if (File::exists('keuangan/laporan-keuangan/'.$lk->file)) {
                File::delete('keuangan/laporan-keuangan/'.$lk->file);
            }
                $file = $request->file('file');
                $lk->file=time().'_'.$file->getClientOriginalName();
                $file->move(\public_path('keuangan/laporan-keuangan'),$lk->file);
                $request['file'] = $lk->file;
             }

                $lk->update([
                'title'       => $request->title,
                'file'        => $lk->file
                ]);

        return redirect()->route('laporan-keuangan.index')->with('success', 'Edit laporan keuangan successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lk = LaporanKeuangan::findOrFail($id);

        if (File::exists("keuangan/laporan-keuangan/".$lk->file))
        {
           File::delete("keuangan/laporan-keuangan/".$lk->file);
        }

        LaporanKeuangan::find($id)->delete();

       return redirect()->route('laporan-keuangan.index')->with('success', 'Delete laporan keuangan successfully.');
    }
}
