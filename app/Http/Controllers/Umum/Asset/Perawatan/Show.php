<?php

use App\Models\Pegawai;
use App\Models\PerawatanAssetUmum;

$kib = PerawatanAssetUmum::findOrFail($id);

$kasubUmum = Pegawai::all();
$namakasubUmum = "";
$nipkasubUmum = "";
foreach ($kasubUmum as $kad) {
    foreach ($kad->pegawaiJabatan->where('nama_jabatan', 'Kasubbag Umum') as $val) {
        if ($kad->pegawaiJabatan->count() > 0) {
            $namakasubUmum = $kad->nama;
            $nipkasubUmum = $kad->nip;
        } else {
        }
    }
}