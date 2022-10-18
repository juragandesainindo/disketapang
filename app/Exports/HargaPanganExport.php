<?php

namespace App\Exports;

use App\Models\HargaPangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HargaPanganExport implements FromView, ShouldAutoSize
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(String $from = null,String $to = null,String $nama_pasar = null)
    {
        $this->from = $from;
        $this->to = $to;
        $this->nama_pasar = $nama_pasar;
    }
     
    public function view(): View
    {
        return view('distribusi.harga-pangan.excel', [
        	'hargaPangan' => HargaPangan::select()->where('tanggal','>=',$this->from)->where('tanggal','<=',$this->to)->where('nama_pasar',$this->nama_pasar)->get()
        ]);
    }
}
