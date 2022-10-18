<?php

namespace App\Http\Controllers\Kerawanan;

use App\Http\Controllers\Controller;
use App\Models\Fsva;
use App\Models\FsvaPeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FsvaController extends Controller
{
	public function index()
	{
	    $edit=1;
		$data = Fsva::orderBy('id','desc')->get();
		return view('kerawanan.fsva.index', compact('data','edit'));
	}

	public function store(Request $request)
	{
		if ($request->hasFile('excel')) {
			$file = $request->file('excel');
			$imageName = time().'_'.$file->getClientOriginalName();
			$file->move(\public_path('kerawanan/fsva'),$imageName);

			$fsva = new Fsva([
				'keterangan'	=> $request->keterangan,
				'tanggal'       => $request->tanggal,
				'excel'	=> $imageName,
			]);

			$fsva->save();
		}

        return back()->with('success','Create Peta Fsva Tahunan successfully');
	}
	
	public function show($id)
	{
	    $edit =1;
		$data = Fsva::findOrFail($id);
		return view('kerawanan.fsva.show', compact('data','edit'));
	}
	
	public function update(Request $request, $id)
	{
	    $peta = Fsva::findOrFail($id);
             if($request->hasFile("excel")){
                 if (File::exists("kerawanan/fsva/".$peta->excel)) {
                     File::delete("kerawanan/fsva/".$peta->excel);
                 }
                 $file=$request->file("excel");
                 $peta->excel=time()."_".$file->getClientOriginalName();
                 $file->move(\public_path("kerawanan/fsva"),$peta->excel);
                 $request['peta']=$peta->excel;
             }

                $peta->update([
                'keterangan'	=> $request->keterangan,
                'tanggal'       => $request->tanggal,
                'excel'        => $peta->excel
                ]);

        return back()->with('success','Update Fsva Tahunan successfully');
	}

	public function destroy($id)
	{
		$data = Fsva::findOrFail($id);
		if (File::exists('kerawanan/fsva/'.$data->excel)) {
			File::delete('kerawanan/fsva/'.$data->excel);
		}

		Fsva::find($id)->delete();

		return back()->with('success','Delete Peta Fsva Tahunan successfully');
	}
	
	
	
	
	
	public function storePeta(Request $request)
	{
		if ($request->hasFile('peta')) {
			$file = $request->file('peta');
			$imageName = time().'_'.$file->getClientOriginalName();
			$file->move(\public_path('kerawanan/fsva-peta'),$imageName);

			$peta = new FsvaPeta([
				'ket'	=> $request->ket,
				'fsva_id'       => $request->fsva_id,
				'peta'	=> $imageName,
			]);

			$peta->save();
		}

        return back()->with('success','Create Peta Fsva Tahunan successfully');
	}
	
	public function updatePeta(Request $request, $id)
	{
	    $peta = FsvaPeta::findOrFail($id);
             if($request->hasFile("peta")){
                 if (File::exists("kerawanan/fsva-peta/".$peta->peta)) {
                     File::delete("kerawanan/fsva-peta/".$peta->peta);
                 }
                 $file=$request->file("peta");
                 $peta->peta=time()."_".$file->getClientOriginalName();
                 $file->move(\public_path("kerawanan/fsva-peta"),$peta->peta);
                 $request['peta']=$peta->peta;
             }

                $peta->update([
                'ket'	=> $request->ket,
                'peta'        => $peta->peta
                ]);

        return back()->with('success','Update Peta Fsva Tahunan successfully');
	}
	
	public function destroyPeta($id)
	{
	    $peta = FsvaPeta::findOrFail($id);

        if (File::exists("kerawanan/fsva-peta/".$peta->peta))
        {
           File::delete("kerawanan/fsva-peta/".$peta->peta);
        }

        FsvaPeta::find($id)->delete();

        return back()->with('success','Delete Peta Fsva Tahunan successfully');
	}
	
	
}