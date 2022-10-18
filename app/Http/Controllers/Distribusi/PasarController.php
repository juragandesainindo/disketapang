<?php

namespace App\Http\Controllers\Distribusi;

use App\Http\Controllers\Controller;
use App\Models\PasarLembaga;
use App\Models\PasarJenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Exports\PasarExport;
use Maatwebsite\Excel\Facades\Excel;

class PasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edit = 1;
        $pasar = PasarLembaga::all();
        return view('distribusi.pasar.index',compact('edit','pasar'));
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
        $pasar = new PasarLembaga ([
            'nama_lembaga' => $request->nama_lembaga
        ]);

        $pasar->save();
        return back()->with('success','Create lembaga pasar successfully');
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
        $pasar = PasarLembaga::findOrFail($id);
        return view('distribusi.pasar.show', compact('pasar','edit'));
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
        $pasar = PasarLembaga::findOrFail($id);
        $pasar->update([
            'nama_lembaga'  => $request->nama_lembaga
        ]);

        return back()->with('success','Update lembaga pasar successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasar = PasarLembaga::findOrFail($id);
        PasarLembaga::find($id)->delete();
        return back()->with('success','Delete lembaga pasar successfully');
    }

    public function storeJenis(Request $request)
    {
        $request->validate([
            'nama_pasar'    => 'required',
            'alamat'    => 'required',
            'link'    => 'required',
            'kecamatan'    => 'required',
            'foto'    => 'image',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('distribusi/pasar'),$imageName);
        }

        $data = new PasarJenis;
        $data->nama_pasar   = $request->nama_pasar;
        $data->alamat   = $request->alamat;
        $data->link         = $request->link;
        $data->kecamatan    = $request->kecamatan;
        $data->foto         = $imageName;
        $data->pasar_lembaga_id = $request->pasar_lembaga_id;

        $data->save();

        return back()->with('success','Create pasar successfully');
    }

    public function updateJenis(Request $request, $id)
    {
        $data = PasarJenis::findOrFail($id);

        if ($request->hasFile('foto')) {
            if (File::exists('distribusi/pasar/'.$data->foto)) {
                File::delete('distribusi/pasar/'.$data->foto);
            }

            $file = $request->file('foto');
            $data->foto = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('distribusi/pasar'), $data->foto);
            $request['pasar_jenis'] = $data->foto;
        }
        
        $data->update([
            'nama_pasar'    => $request->nama_pasar,
            'alamat'        => $request->alamat,
            'link'          => $request->link,
            'kecamatan'     => $request->kecamatan,
            'foto'          => $data->foto,
        ]);

        return back()->with('success','Update pasar successfully');
    }

    public function destroyJenis($id)
    {
        $data = PasarJenis::findOrFail($id);
        if (File::exists('distribusi/pasar/'.$data->foto))
            {
               File::delete('distribusi/pasar/'.$data->foto);
            }
        PasarJenis::find($id)->delete();
        return back()->with('success','Delete pasar successfully');
    }
    
    public function export()
    {
        $pasar = PasarLembaga::all();
        return view('distribusi.pasar.export',compact('pasar'));
    }
    
    public function excel()
    {
        return Excel::download(new PasarExport, 'pasar.xlsx');
    }
}
