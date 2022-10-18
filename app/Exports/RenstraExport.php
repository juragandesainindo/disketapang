<?php

namespace App\Exports;

use App\Models\Renstra;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RenstraExport implements FromView, ShouldAutoSize
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(String $from = null , String $to = null)
    {
        $this->from = $from;
        $this->to   = $to;
    }
     
    public function view(): View
    {
        return view('keuangan.renstra.excel', [
        	'renstra' => Renstra::select()->where('tahun','>=',$this->from)->where('tahun','<=', $this->to)->get()
        ]);
    }
}
