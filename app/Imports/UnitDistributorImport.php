<?php

namespace App\Imports;

use App\Models\UnitDistributor;
use Maatwebsite\Excel\Concerns\ToModel;

class UnitDistributorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UnitDistributor([
            'nama_perusahaan'   =>$row[0]
        ]);
    }
}
