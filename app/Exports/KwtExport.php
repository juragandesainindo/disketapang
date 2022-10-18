<?php
	namespace App\Exports;
	use App\Models\KwtKelompok;
	use Illuminate\Contracts\View\View;
	use Maatwebsite\Excel\Concerns\Exportable;
	use Maatwebsite\Excel\Concerns\FromView;
	use Maatwebsite\Excel\Concerns\ShouldAutoSize;

	class KwtExport implements FromView, ShouldAutoSize
	{
		use Exportable;

    		public function view(): View
    		{
    			return view('konsumsi.kwt.export', [
    			'data' => KwtKelompok::orderBy('kwt_kecamatan_id','desc')->orderBy('kwt_kelurahan_id','desc')->orderBy('nama_kwt','asc')->get()
    			]);
    		}
    
	}