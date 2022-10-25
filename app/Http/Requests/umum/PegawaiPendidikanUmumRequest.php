<?php

namespace App\Http\Requests\umum;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiPendidikanUmumRequest extends FormRequest
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
            'jenjang_pendidikan' => 'required',
            'jurusan' => 'required',
            'nama_sekolah' => 'required',
            'tahun_lulus' => 'required',
            'foto' => 'nullable|mimes:png,jpg,jpeg,pdf',
            'pegawai_id' => 'required',

        ];
    }
}