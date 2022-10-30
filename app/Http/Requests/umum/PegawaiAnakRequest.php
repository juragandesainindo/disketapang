<?php

namespace App\Http\Requests\umum;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiAnakRequest extends FormRequest
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
            'nama_anak' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_anak' => 'required',
            'pekerjaan' => 'required',
            'foto' => 'nullable|mimes:png,jpg,jpeg,pdf',
            'pegawai_id' => 'required',
        ];
    }
}