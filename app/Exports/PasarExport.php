<?php
	namespace App\Exports;
	use App\Models\PasarLembaga;
	use Illuminate\Contracts\View\View;
	use Maatwebsite\Excel\Concerns\Exportable;
	use Maatwebsite\Excel\Concerns\FromView;
	use Maatwebsite\Excel\Concerns\ShouldAutoSize;

	class PasarExport implements FromView, ShouldAutoSize
	{
		use Exportable;

    		public function view(): View
    		{
    			return view('distribusi.pasar.excel', [
    			'data' => PasarLembaga::all()
    			]);
    		}
    
	}