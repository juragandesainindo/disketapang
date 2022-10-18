<?php
namespace App\Exports;

use App\Models\DktKelompok;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DktExport implements ShouldAutoSize, FromView
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     
     public function view(): View
    {
        return view('kerawanan.dkt.excel', [
        	'data' => DktKelompok::all()
        ]);
    }
}