<?php

namespace App\Exports;

use App\Models\EvaluasiRenstra;
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
    // public function __construct(String $from = null , String $to = null)
    public function __construct(String $from = null)
    {
        $this->from = $from;
        // $this->to   = $to;
    }

    public function view(): View
    {
        return view('keuangan.renstra.excel', [
            'renstra' => EvaluasiRenstra::select()->where('tahun', '>=', $this->from)->get()
        ]);
    }
}
