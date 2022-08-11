<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DivisiRequest extends FormRequest
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
            'txtIdDivisi' => [
                'required',
                'max:8',
                Rule::unique('mdivisis', 'txtIdDivisi')
            ],
            'txtNamaDivisi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'txtIdDivisi.required' => 'Id Divisi Wajib Di isi',
            'txtIdDivisi.max' => 'Maksimal 8 karakter',
            'txtIdDivisi.unique' => 'ID Divisi tidak boleh sama',
            'txtNamaDivisi.required' => 'Nama Divisi wajib diisi'
        ];
    }
}
