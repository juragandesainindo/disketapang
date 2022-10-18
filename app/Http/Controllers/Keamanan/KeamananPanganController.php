<?php

namespace App\Http\Controllers\Keamanan;

use App\Http\Controllers\Controller;
use App\Models\DataKeamananPangan;
use App\Models\SampelKeamananPangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Exports\SampelPanganSegarExport;
use Maatwebsite\Excel\Facades\Excel;

class KeamananPanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post'))
        {
            $from = $req->input('from');
            $to   = $req->input('to');
            if($req->has('exportExcel'))
            {
                return Excel::download(new SampelPanganSegarExport($from,$to), 'sampel-pangan-segar.xlsx');
            } 

        }
            else
        {
            $edit = 1;
            $editSampel = 1;
            $data = DataKeamananPangan::orderBy('id','desc')->get();
            $sampel = SampelKeamananPangan::orderBy('tgl_pemeriksaan','desc')->orderBy('lokasi','desc')->orderBy('sayuran','desc')->get();
            return view('keamanan.data-keamanan.index', compact('data','edit','sampel','editSampel'));
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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('keamanan/data-keamanan-pangan'),$imageName);

            $data = new DataKeamananPangan([
                'title'     => $request->title,
                'file'      => $imageName
            ]);

            $data->save();
        }

        return back()->with('success','Upload data keamanan pangan successfully');
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
        $data = DataKeamananPangan::findOrFail($id);
        if ($request->hasFile('file')) {
            if (File::exists('keamanan/data-keamanan-pangan'.$data->file)) {
                File::delete('keamanan/data-keamanan-pangan'.$data->file);
            }
            $file = $request->file('file');
            $data->file = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('keamanan/data-keamanan-pangan'),$data->file);
            $request['data_keamanan_pangan'] = $data->file;
        }

        $data->update([
                'title'     => $request->title,
                'file'      => $data->file
            ]);

        return back()->with('success','Update data keamanan pangan successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataKeamananPangan::findOrFail($id);

        if (File::exists("keamanan/data-keamanan-pangan/".$data->file))
        {
           File::delete("keamanan/data-keamanan-pangan/".$data->file);
        }

        DataKeamananPangan::find($id)->delete();

        return back()->with('success','Delete data keamanan pangan successfully');
    }
    
    public function storeSampel(Request $request)
    {
        $sampel = new SampelKeamananPangan([
            'tgl_pemeriksaan'   => $request->tgl_pemeriksaan,
            'lokasi'            => $request->lokasi,
            'alamat'            => $request->alamat,
            'sayuran'           => $request->sayuran,
            'buah'              => $request->buah,
            'lainnya'              => $request->lainnya,
            'asal'              => $request->asal,
            'hasil'             => $request->hasil,
            ]);
            
        $sampel->save();
        
        return back()->with('success','Create sampel pangan segar successfully');
    }
    
    public function updateSampel(Request $request,$id)
    {
        $sampel = SampelKeamananPangan::findOrFail($id);
        $sampel->update([
            'tgl_pemeriksaan'   => $request->tgl_pemeriksaan,
            'lokasi'            => $request->lokasi,
            'alamat'            => $request->alamat,
            'sayuran'           => $request->sayuran,
            'buah'              => $request->buah,
            'lainnya'              => $request->lainnya,
            'asal'              => $request->asal,
            'hasil'             => $request->hasil,
            ]);
        
        return back()->with('success','Update sampel pangan segar successfully');
    }
    
    public function destroySampel($id)
    {
        $sampel = SampelKeamananPangan::findOrFail($id);
        SampelKeamananPangan::find($id)->delete();
        
        return back()->with('success','Delete sampel pangan segar successfully');
    }
}
