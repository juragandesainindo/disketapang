<?php

namespace App\Exports;

use App\Models\SampelKeamananPangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SampelPanganSegarExport implements FromView, ShouldAutoSize

{

	use Exportable;

	/**
    * @return \Illuminate\Support\Collection
    */
    
	public function __construct(String $from = null , String $to = null)
    
	{ 
	    $this->from = $from;
	    $this->to = $to;
	}
     
    
	public function view(): View
    
	{
        
	return view('keamanan.data-keamanan.excel', [
	    'sampel' => SampelKeamananPangan::select()->where('tgl_pemeriksaan','>=',$this->from)->where('tgl_pemeriksaan','<=',$this->to)->get()
        ]);
    
	}

}