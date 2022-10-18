<?php

namespace App\Http\Controllers\Kerawanan;

use App\Http\Controllers\Controller;
use App\Models\Skpg;
use App\Models\SkpgPeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SkpgController extends Controller
{
	public function indexSkpg()
	{
		$edit = 1;
		$data = Skpg::orderBy('date','desc')->get();
		return view('kerawanan.skpg.index', compact('data','edit'));
	}

	public function storeSkpg(Request $request)
	{
		if ($request->hasFile('excel')) {
			$file = $request->file('excel');
			$imageName = time().'_'.$file->getClientOriginalName();
			$file->move(\public_path('kerawanan/skpg'),$imageName);

			$skpg = new Skpg([
				'keterangan'	=> $request->keterangan,
				'date'          => $request->date,
				'excel'	=> $imageName,
			]);

			$skpg->save();
		}

        return back()->with('success','Create SKPG successfully');
	}
	
	public function showSkpg($id)
	{
	    $edit=1;
		$data = Skpg::findOrFail($id);
		return view('kerawanan.skpg.show', compact('data','edit'));
	}
	
	public function updateSkpg(Request $request, $id)
	{
	    $peta = Skpg::findOrFail($id);
             if($request->hasFile("excel")){
                 if (File::exists("kerawanan/skpg/".$peta->excel)) {
                     File::delete("kerawanan/skpg/".$peta->excel);
                 }
                 $file=$request->file("excel");
                 $peta->excel=time()."_".$file->getClientOriginalName();
                 $file->move(\public_path("kerawanan/skpg"),$peta->excel);
                 $request['peta']=$peta->excel;
             }

                $peta->update([
                'keterangan'	=> $request->keterangan,
                'date'	=> $request->date,
                'excel'        => $peta->excel
                ]);

        return back()->with('success','Update SKPG successfully');
	}
	
	public function destroySkpg($id)
	{
		$data = Skpg::findOrFail($id);
		if (File::exists('kerawanan/skpg/'.$data->excel)) {
			File::delete('kerawanan/skpg/'.$data->excel);
		}

		Skpg::find($id)->delete();

		return back()->with('success','Delete SKPG successfully');
	}
	
	public function storePeta(Request $request)
	{
		if ($request->hasFile('peta')) {
			$file = $request->file('peta');
			$imageName = time().'_'.$file->getClientOriginalName();
			$file->move(\public_path('kerawanan/skpg'),$imageName);

			$peta = new SkpgPeta([
				'keterangan'	=> $request->keterangan,
				'skpg_id'       => $request->skpg_id,
				'peta'	=> $imageName,
			]);

			$peta->save();
		}

        return back()->with('success','Create peta skpg successfully');
	}
	
	public function updatePeta(Request $request, $id)
	{
	    $peta = SkpgPeta::findOrFail($id);
             if($request->hasFile("peta")){
                 if (File::exists("kerawanan/skpg/".$peta->peta)) {
                     File::delete("kerawanan/skpg/".$peta->peta);
                 }
                 $file=$request->file("peta");
                 $peta->peta=time()."_".$file->getClientOriginalName();
                 $file->move(\public_path("kerawanan/skpg"),$peta->peta);
                 $request['peta']=$peta->peta;
             }

                $peta->update([
                'keterangan'	=> $request->keterangan,
                'peta'        => $peta->peta
                ]);

        return back()->with('success','Update peta skpg successfully');
	}
	
	public function destroyPeta($id)
	{
	    $peta = SkpgPeta::findOrFail($id);

        if (File::exists("kerawanan/skpg/".$peta->peta))
        {
           File::delete("kerawanan/skpg/".$peta->peta);
        }

        SkpgPeta::find($id)->delete();

        return back()->with('success','Delete peta skpg successfully');
	}
	
	
}