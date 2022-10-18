<?php
namespace App\Exports;

use App\Models\DataPanganLokal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataPanganLokalExport implements ShouldAutoSize, FromView
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     
     public function view(): View
    {
        return view('keamanan.data-pangan-lokal.excel', [
        	'data' => DataPanganLokal::all()
        ]);
    }
}