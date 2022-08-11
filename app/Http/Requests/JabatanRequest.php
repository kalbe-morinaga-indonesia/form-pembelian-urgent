<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class JabatanRequest extends FormRequest
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
            'txtIdJabatan' => [
                'required',
                'max:8',
                Rule::unique('mjabatans', 'txtIdJabatan')
            ],
            'txtIdDept' => 'required',
            'txtNamaJabatan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtIdJabatan.required' => 'Id Jabatan Wajib Diisi',
            'txtIdJabatan.max' => 'Maksimal 8 karakter',
            'txtIdJabatan.unique' => 'Id Jabatan tidak boleh sama',
            'txtNamaJabatan.required' => 'Nama Jabatan Wajib Diisi',
            'txtIdDept.required' => 'Department Wajib Diisi'
        ];
    }
}
