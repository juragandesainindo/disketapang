<?php
namespace App\Exports;

use App\Models\BeritaAcara;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BeritaAcaraExport implements ShouldAutoSize, FromView
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     
     
     public function view(): View
    {
        return view('kerawanan.kt-kamapan.monev.excel', [
        	'data' => BeritaAcara::find(request('id'))
        ]);
    }
}