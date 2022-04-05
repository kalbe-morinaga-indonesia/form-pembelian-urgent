<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'txtNik' => [
                'required',
                'max:16',
                'alpha_dash',
                Rule::unique('musers', 'txtNik')
                    ->ignore($this->user)
            ],
            'txtNama' => 'required',
            'txtNoHp' => 'max:13',
            'txtPassword' => 'sometimes|required|min:8|confirmed',
            'txtPassword_confirmation' => 'sometimes|required_with:txtPassword|same:txtPassword',
            'mdepartment_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // required
            'txtNama.required' => "Nama Lengkap harus diisi",
            'txtNik.required' => "NIK harus diisi",
            'txtPassword.required' => "Password harus diisi",
            'txtPassword_confirmation.required' => "Konfirmasi Password harus diisi",
            'mdepartment_id.required' => "Department harus diisi",

            // unique
            'txtNik.unique' => "NIK tidak boleh sama",

            // min
            'txtPassword.min' => "Password minimal 8 karakter",

            // max
            'txtNoHp.max' => "Nomor handphone maksimal 13 karakter",
            'txtNik.max' => "NIK maksimal 16 karakter",

            // no space
            'txtNik.alpha_dash' => "NIK tidak boleh menggunakan spasi",

            // confirmed
            'txtPassword.confirmed' => "Konfirmasi password tidak cocok dengan password",
        ];
    }
}
