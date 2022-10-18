<?php

namespace App\Http\Requests\umum\asset;

use Illuminate\Foundation\Http\FormRequest;

class KibERequest extends FormRequest
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
            'judul' => 'nullable',
            'penerbit' => 'nullable',
            'pencipta' => 'nullable',
            'asal' => 'nullable',
            'bahan' => 'nullable',
            'spesifikasi' => 'nullable',
            'kategori' => 'required',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
        ];
    }
}