<?php

namespace App\Http\Requests\umum;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiOrtuRequest extends FormRequest
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
            'nama_ortu' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status' => 'required',
            'pekerjaan' => 'required',
            'foto' => 'nullable|mimes:png,jpg,jpeg,pdf',
            'pegawai_id' => 'required',
        ];
    }
}