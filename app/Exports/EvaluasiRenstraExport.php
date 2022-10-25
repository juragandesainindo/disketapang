<?php

namespace App\Exports;

use App\Models\EvaluasiRenstra;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class EvaluasiRenstraExport implements FromView
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct(String $form = null)
    {
        $this->form = $form;
    }
    public function view(): View
    {
        return view('keuangan.evaluasi-renstra.excel', [
            'renstra' => EvaluasiRenstra::select()->where('tahun', '>=', $this->form)->get()
        ]);
    }
}