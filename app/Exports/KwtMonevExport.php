<?php
namespace App\Exports;

use App\Models\KwtBerita;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KwtMonevExport implements ShouldAutoSize, FromView
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     
     
     public function view(): View
    {
        return view('konsumsi.bantuan.monev.excel', [
        	'data' => KwtBerita::find(request('id'))
        ]);
    }
}