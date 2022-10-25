<?php

namespace App\Http\Requests\umum;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiJabatanRequest extends FormRequest
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
            'nama_jabatan' => 'required',
            'eselon' => 'required',
            'tmt_jabatan' => 'required',
            'akhir_jabatan' => 'required',
            'foto' => 'nullable|mimes:png,jpg,jpeg,pdf',
            'pegawai_id' => 'required',
        ];
    }
}