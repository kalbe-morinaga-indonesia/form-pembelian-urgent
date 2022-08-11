<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SubdepartmentRequest extends FormRequest
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
            'txtIdSubDept' => [
                'required',
                'max:8',
                Rule::unique('msubdeparments', 'txtIdSubDept')
            ],
            'txtIdDept' => 'required',
            'txtNamaSubDept' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtIdSubDept.required' => 'Id Sub Department Wajib Diisi',
            'txtIdSubDept.max' => 'Maksimal 8 karakter',
            'txtIdSubDept.unique' => 'Id Sub Dept tidak boleh sama',
            'txtNamaSubDept.required' => 'Nama Department Wajib Diisi',
            'txtIdDept.required' => 'Department Wajib Diisi'
        ];
    }
}
