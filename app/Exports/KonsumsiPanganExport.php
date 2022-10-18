<?php
namespace App\Exports;

use App\Models\KonsumsiPangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KonsumsiPanganExport implements ShouldAutoSize, FromView
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     
     public function view(): View
    {
        return view('keamanan.konsumsi-pangan.excel', [
        	'data' => KonsumsiPangan::all()
        ]);
    }
}