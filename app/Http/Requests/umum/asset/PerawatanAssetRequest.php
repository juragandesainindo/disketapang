<?php

namespace App\Http\Requests\umum\asset;

use Illuminate\Foundation\Http\FormRequest;

class PerawatanAssetRequest extends FormRequest
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
            'tgl' => 'required',
            'uraian' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:1000',
        ];
    }
}