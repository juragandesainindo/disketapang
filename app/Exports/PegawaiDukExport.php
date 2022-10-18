<?php
	namespace App\Exports;
	use App\Models\Pegawai;
	use Illuminate\Contracts\View\View;
	use Maatwebsite\Excel\Concerns\Exportable;
	use Maatwebsite\Excel\Concerns\FromView;
	use Maatwebsite\Excel\Concerns\ShouldAutoSize;

	class PegawaiDukExport implements FromView, ShouldAutoSize
	{
		use Exportable;

    		public function view(): View
    		{
    			return view('umum.pegawai.print-excel', [
    			'pegawai' => Pegawai::all()
    			]);
    		}
    
	}