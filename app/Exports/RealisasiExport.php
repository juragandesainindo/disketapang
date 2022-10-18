<?php

namespace App\Exports;

use App\Models\Realisasi;
use App\Models\Kegiatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RealisasiExport implements FromView, ShouldAutoSize
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(String $from = null)
    {
        $this->from = $from;
    }
     
    public function view(): View
    {
        return view('keuangan.laporan-realisasi.excel', [
        	'realisasi' => Kegiatan::select()->where('tahun','>=',$this->from)->get()
        ]);
    }
}
