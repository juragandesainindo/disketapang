<?php
	namespace App\Exports;
	use App\Models\UnitDistributor;
	use Illuminate\Contracts\View\View;
	use Maatwebsite\Excel\Concerns\Exportable;
	use Maatwebsite\Excel\Concerns\FromView;
	use Maatwebsite\Excel\Concerns\ShouldAutoSize;

	class UnitDistributorExport implements FromView, ShouldAutoSize
	{
		use Exportable;

    		public function view(): View
    		{
    			return view('distribusi.unit-distributor.excel', [
    			'data' => UnitDistributor::all()
    			]);
    		}
    
	}