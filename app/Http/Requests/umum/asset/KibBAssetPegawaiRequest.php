<?php

namespace App\Http\Requests\umum\asset;

use Illuminate\Foundation\Http\FormRequest;

class KibBAssetPegawaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pegawai_id' => 'nullable',
            'jenis_barang' => 'required',
            'merk_type' => 'required',
            'nopol' => 'nullable',
            'ukuran' => 'nullable',
            'bahan_warna' => 'nullable',
            'spesifikasi' => 'nullable',
            'no_pabrik' => 'nullable',
            'no_rangka' => 'nullable',
            'no_mesin' => 'nullable',
            'bpkb' => 'nullable',
            'stnk' => 'nullable',
            'masa_manfaat' => 'nullable',
            'sisa_manfaat' => 'nullable',
        ];
    }
}