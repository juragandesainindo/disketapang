<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KendaraanRequest extends FormRequest
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
            'registrasi'       => 'required',
            'nama'             => 'required',
            'alamat'           => 'required',
            'merk'             => 'required',
            'type'             => 'required',
            'jenis'            => 'required',
            'model'            => 'required',
            'tahun_pembuatan'  => 'required',
            'silinder'         => 'required',
            'no_rangka'        => 'required',
            'no_mesin'         => 'required',
            'warna'            => 'required',
            'bahan_bakar'      => 'required',
            'warna_tnkb'       => 'required',
            'berlaku'          => 'required',
            'image'            => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
            'image_s_kiri'     => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
            'image_s_kanan'    => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
            'image_belakang'   => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
            'image_dalam'      => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
            'image_mesin'      => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
        ];
    }
}