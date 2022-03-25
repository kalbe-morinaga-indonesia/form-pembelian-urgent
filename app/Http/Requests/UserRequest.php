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
                Rule::unique('musers', 'txtNik')
                    ->ignore($this->user)
            ],
            'txtNama' => 'required',
            'txtNoHp' => 'max:13',
            'txtUsername' =>
            [
                'required',
                Rule::unique('musers', 'txtusername')
                    ->ignore($this->user)
            ],
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
            'txtUsername.required' => "Username harus diisi",
            'txtPassword.required' => "Password harus diisi",
            'txtPassword_confirmation.required' => "Konfirmasi Password harus diisi",
            'mdepartment_id.required' => "Department harus diisi",

            // unique
            'txtUsername.unique' => "Username tidak boleh sama",
            'txtNik.unique' => "NIK tidak boleh sama",

            // min
            'txtUsername.min' => "Username minimal 6 karakter",
            'txtPassword.min' => "Password minimal 8 karakter",

            // max
            'txtNoHp.max' => "Nomor handphone maksimal 13 karakter",
            'txtNik.max' => "NIK maksimal 16 karakter",

            // no space
            'txtUsername.alpha_dash' => "Username tidak boleh menggunakan spasi",

            // confirmed
            'txtPassword.confirmed' => "Konfirmasi password tidak cocok dengan password",
        ];
    }
}
