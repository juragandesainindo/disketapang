<?php
	namespace App\Exports;
	use App\Models\Kendaraan;
	use Illuminate\Contracts\View\View;
	use Maatwebsite\Excel\Concerns\Exportable;
	use Maatwebsite\Excel\Concerns\FromView;
	use Maatwebsite\Excel\Concerns\ShouldAutoSize;

	class KendaraanExport implements FromView, ShouldAutoSize
	{
		use Exportable;

    		public function view(): View
    		{
    			return view('umum.kendaraan.excel', [
    			'data' => Kendaraan::all()
    			]);
    		}
    
	}