<?php

namespace App\Http\Requests\umum;

use Illuminate\Foundation\Http\FormRequest;

class LaporanRekonUpdateRequest extends FormRequest
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
            'asset_umum_id' => 'required',
            'nama_penyedia' => 'required',
            'kode_belanja' => 'required',
            'uraian_belanja' => 'required',
            'kasubag_nip' => 'required',
            'kasubag_nama' => 'required',
            'pegawai_id' => 'required',
            'nama_skpd' => 'required',
            'nip_skpd' => 'required',
            'pangkat_skpd' => 'required',
            'jabatan_skpd' => 'required',
            'nama_kepala_skpd' => 'required',
            'nip_kepala_skpd' => 'required',
        ];
    }
}