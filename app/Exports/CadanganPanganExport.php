<?php
namespace App\Exports;

use App\Models\CadanganPangan;
use App\Models\Stok;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CadanganPanganExport implements ShouldAutoSize, FromView
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     // varible form and to 
     public function __construct(String $from = null , String $to = null)
     {
         $this->from = $from;
         $this->to   = $to;
     }
     
     //function select data from database 
    //  public function collection()
    //  {
    //      return Stok::select()->where('tanggal','>=',$this->from)->where('tanggal','<=', $this->to)->get();  
    //  }
     
     public function view(): View
    {
        return view('distribusi.cadangan-pangan.excel', [
        	'data' => Stok::select()->where('tanggal','>=',$this->from)->where('tanggal','<=', $this->to)->get()
        ]);
    }
}