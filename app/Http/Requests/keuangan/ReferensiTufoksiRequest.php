<?php

namespace App\Http\Requests\keuangan;

use Illuminate\Foundation\Http\FormRequest;

class ReferensiTufoksiRequest extends FormRequest
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
            'nomor_peraturan'   => 'required',
            'uraian'            => 'required',
            'tanggal'           => 'required',
            'file'              => 'required|mimes:pdf',
        ];
    }
}