<?php

namespace App\Http\Controllers\Kerawanan;

use App\Http\Controllers\Controller;
use App\Models\PPHKetersediaan;
use Illuminate\Http\Request;
use DB;

class PPHKetersediaanController extends Controller
{
	public function index()
	{
		$energi = DB::table('pph_ketersediaan')
	    ->sum('pph_ketersediaan.energi');

	    $skor_pph = DB::table('pph_ketersediaan')
	    ->sum('pph_ketersediaan.skor_pph');

		$edit = 1;
		$data = PPHKetersediaan::orderBy('tahun','desc')->get();
		return view('kerawanan.pph-ketersediaan.index', compact('data','edit','energi','skor_pph'));
		
	}

	public function store(Request $request)
	{
		$data = new PPHKetersediaan([
			'bahan_makanan'	=> $request->bahan_makanan,
			'energi'		=> $request->energi,
			'skor_pph'		=> $request->skor_pph,
			'tahun'			=> $request->tahun
		]);

		$data->save();

		return back()->with('success','Upload PPH Ketersediaan successfully');
	}

	public function update(Request $request, $id)
	{
		$data = PPHKetersediaan::findOrFail($id);
		$data->update([
			'bahan_makanan'	=> $request->bahan_makanan,
			'energi'		=> $request->energi,
			'skor_pph'		=> $request->skor_pph,
			'tahun'			=> $request->tahun
		]);

		return back()->with('success','Update PPH Ketersediaan successfully');
	}

	public function destroy($id)
	{
		$data = PPHKetersediaan::findOrFail($id);

		PPHKetersediaan::find($id)->delete();

		return back()->with('success','Delete PPH Ketersediaan successfully');
	}

	public function search(Request $request)
	{
		$energi = DB::table('pph_ketersediaan')
	    ->sum('pph_ketersediaan.energi');

	    $skor_pph = DB::table('pph_ketersediaan')
	    ->sum('pph_ketersediaan.skor_pph');

		$edit = 1;
		$search = $request->get('search');
		$data = PPHKetersediaan::where('tahun', 'like', '%'.$search.'%')->paginate(5);
		return view('kerawanan.pph-ketersediaan.index', compact('data','edit','energi','skor_pph'));
	}
}