<?php

namespace App\Http\Requests\umum\asset;

use Illuminate\Foundation\Http\FormRequest;

class AtbRequest extends FormRequest
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
            'id_brg' => 'required',
            'kode_brg' => 'required',
            'nama_brg' => 'required',
            'tgl_perolehan' => 'required',
            'nilai_brg' => 'required',
            'nilai_perolehan' => 'nullable',
            'nilai_surut' => 'nullable',
            'penggunaan' => 'required',
            'keterangan' => 'required',
            'penanggung_jawab' => 'required',
            'nama_developer' => 'nullable',
            'kontak_developer' => 'nullable',
            'instansi_developer' => 'nullable',
            'kategori' => 'required',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
        ];
    }
}