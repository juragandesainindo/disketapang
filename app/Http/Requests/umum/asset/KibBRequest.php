<?php

namespace App\Http\Requests\umum\asset;

use Illuminate\Foundation\Http\FormRequest;

class KibBRequest extends FormRequest
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
            'mapping_asset_id' => 'required',
            'pemakai' => 'nullable',
            'tgl_perolehan' => 'required',
            'nilai_brg' => 'required',
            'nilai_perolehan' => 'nullable',
            'nilai_surut' => 'nullable',
            'penggunaan' => 'required',
            'keterangan' => 'required',
            'penanggung_jawab' => 'required',
            'merk_type' => 'nullable',
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
            'kategori' => 'required',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
        ];
    }
}
