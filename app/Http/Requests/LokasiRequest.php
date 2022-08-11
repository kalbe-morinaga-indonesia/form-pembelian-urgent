<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LokasiRequest extends FormRequest
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
            'txtIdLokasi' => 'required|max:8',
            'txtNamaLokasi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'txtIdLokasi.required' => 'Id Lokasi Wajib Diisi',
            'txtIdLokasi.max' => 'Maksimal 8 karakter',
            'txtNamaLokasi.required' => 'Nama Lokasi Wajib Diisi',
        ];
    }
}
