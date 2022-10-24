<?php

namespace App\Http\Requests\umum;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiPangkatRequest extends FormRequest
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
            "nama_pangkat" => 'required',
            "no_sk" => 'required',
            "tgl_sk" => 'required',
            "tmt_pangkat" => 'required',
            "foto" => 'nullable|mimes:png,jpg,jpeg,pdf|max:1024',
            "pegawai_id" => 'required'
        ];
    }
}