<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetUmum extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'asset_umum';
    protected $fillable = [
        'mapping_asset_id',
        'tgl_perolehan',
        'nilai_brg',
        'nilai_perolehan',
        'nilai_surut',
        'sertifikat',
        'alamat',
        'luas',
        'penggunaan',
        'keterangan',
        'jenis_sertifikat',
        'penanggung_jawab',
        'foto',
        'merk_type',
        'nopol',
        'status_asset',
        'masa_manfaat',
        'sisa_manfaat',
        'ukuran',
        'bahan_warna',
        'spesifikasi',
        'no_pabrik',
        'no_rangka',
        'no_mesin',
        'bpkb',
        'stnk',
        'kontruksi',
        'latitude',
        'longitude',
        'tingkat',
        'imb',
        'panjang',
        'lebar',
        'judul',
        'penerbit',
        'pencipta',
        'asal',
        'bahan',
        'kdp',
        'dokumen',
        'tgl_dokumen',
        'pekerjaan',
        'nama_developer',
        'kontak_developer',
        'instansi_developer',
        'kategori',
    ];

    public function mappingAsset()
    {
        return $this->belongsTo(MappingAsset::class);
    }

    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class);
    }

    public function assetUmumPegawai()
    {
        return $this->hasMany(AssetUmumPegawai::class);
    }

    public function assetUmumBast()
    {
        return $this->hasMany(AssetUmumBast::class);
    }
    public function perawatanAssetUmum()
    {
        return $this->hasMany(PerawatanAssetUmum::class);
    }
}