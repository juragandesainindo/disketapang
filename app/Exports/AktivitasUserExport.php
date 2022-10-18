<?php
namespace App\Exports;

use App\Models\BeritaAcara;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;

class AktivitasUserExport implements ShouldAutoSize, FromView
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     
     
     public function view(): View
    {
        return view('usermanagement.excel', [
        	'data' => DB::table('activity_logs')->orderBy('created_at','desc')->get()
        ]);
    }
}