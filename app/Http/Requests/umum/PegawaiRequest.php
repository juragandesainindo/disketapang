<?php

namespace App\Http\Requests\Umum;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
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
            'nip' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'foto_diri' => 'nullable|image|mimes:png,jpg,jpeg|max:1028',
            'kk' => 'nullable|image|mimes:png,jpg,jpeg|max:1028',
            'ktp' => 'nullable|image|mimes:png,jpg,jpeg|max:1028',
            'akte' => 'nullable|image|mimes:png,jpg,jpeg|max:1028',
            'npwp' => 'nullable|image|mimes:png,jpg,jpeg|max:1028',
            'bpjs' => 'nullable|image|mimes:png,jpg,jpeg|max:1028',
        ];
    }
}