<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'txtIdDept' => [
                'required',
                'max:8',
                Rule::unique('mdepartments', 'txtIdDept')
            ],
            'txtNamaDept' => 'required',
            'txtIdDivisi' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'txtIdDept.required' => 'Id Department Wajib Diisi',
            'txtIdDept.max' => 'Maksimal 8 karakter',
            'txtIdDept.unique' => 'Id Dept tidak boleh sama',
            'txtNamaDept.required' => 'Nama Department Wajib Diisi',
            'txtIdDivisi.required' => 'Divisi Wajib Diisi'
        ];
    }
}
