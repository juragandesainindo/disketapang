<?php

namespace App\Http\Requests\umum\asset;

use Illuminate\Foundation\Http\FormRequest;

class KibFRequest extends FormRequest
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
            'tgl_perolehan' => 'required',
            'nilai_brg' => 'required',
            'nilai_perolehan' => 'nullable',
            'nilai_surut' => 'nullable',
            'penggunaan' => 'required',
            'keterangan' => 'required',
            'penanggung_jawab' => 'required',
            'kdp' => 'nullable',
            'dokumen' => 'nullable',
            'tgl_dokumen' => 'nullable',
            'pekerjaan' => 'nullable',
            'alamat' => 'nullable',
            'kategori' => 'required',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
        ];
    }
}