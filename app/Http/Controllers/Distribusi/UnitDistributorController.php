<?php

namespace App\Http\Controllers\Distribusi;

use App\Http\Controllers\Controller;
use App\Models\UnitDistributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Exports\UnitDistributorExport;
use Maatwebsite\Excel\Facades\Excel;

class UnitDistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = UnitDistributor::orderBy('id', 'DESC')->get();
        return view('distribusi.unit-distributor.index', compact('unit'));
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
        if($request->hasFile("gambar")){
            $file=$request->file("gambar");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("distribusi/unit-distributor"),$imageName);

            $unitdistributor = new UnitDistributor([
                "nama_perusahaan" =>$request->nama_perusahaan,
                "bentuk_usaha" =>$request->bentuk_usaha,
                "alamat" =>$request->alamat,
                "link" =>$request->link,
                "telepon" =>$request->telepon,
                "komoditi" =>$request->komoditi,
                "gambar" =>$imageName,
            ]);
           $unitdistributor->save();
        }

        return back()->with('success', 'Create unit distributor successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = UnitDistributor::findOrFail($id);
        return view('distribusi.unit-distributor.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = UnitDistributor::findOrFail($id);
        return view('distribusi.unit-distributor.edit',compact('unit'));
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
        $data = UnitDistributor::findOrFail($id);
         if($request->hasFile("gambar")){
             if (File::exists("distribusi/unit-distributor/".$data->gambar)) {
                 File::delete("distribusi/unit-distributor/".$data->gambar);
             }
             $file=$request->file("gambar");
             $data->gambar=time()."_".$file->getClientOriginalName();
             $file->move(\public_path("distribusi/unit-distributor"),$data->gambar);
             $request['gambar']=$data->gambar;
         }

            $data->update([
                "nama_perusahaan" =>$request->nama_perusahaan,
                "bentuk_usaha" =>$request->bentuk_usaha,
                "alamat" =>$request->alamat,
                "link" =>$request->link,
                "telepon" =>$request->telepon,
                "komoditi" =>$request->komoditi,
                "gambar"=>$data->gambar,
            ]);

            return redirect()->route('unit-distributor.index')->with('success', 'Update unit distributor successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = UnitDistributor::findOrFail($id);

        if (File::exists("distributor/".$data->gambar))
        {
           File::delete("distributor/".$data->gambar);
        }

        UnitDistributor::find($id)->delete();

       return back()->with('success', 'Delete distributor successfully.');
    }
    
    public function export()
    {
        return Excel::download(new UnitDistributorExport, 'unit-distributor.xlsx');
    }
}
