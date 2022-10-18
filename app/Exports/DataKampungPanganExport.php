<?php
namespace App\Exports;

use App\Models\DataKampungPangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataKampungPanganExport implements ShouldAutoSize, FromView
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     
     public function view(): View
    {
        return view('distribusi.data-kampung-pangan.excel', [
        	'data' => DataKampungPangan::orderBy('tahun','desc')->get()
        ]);
    }
}