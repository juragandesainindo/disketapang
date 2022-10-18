<?php

namespace App\Exports;

use App\Models\DaftarGudang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DaftarGudangExport implements FromView, ShouldAutoSize
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('distribusi.daftar-gudang.excel', [
        	'data' => DaftarGudang::all()
        ]);
    }
}
