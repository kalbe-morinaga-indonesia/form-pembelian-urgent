<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UomRequest extends FormRequest
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
            'txtItemCode' => 'required',
            // 'dtmTanggalKebutuhan' => 'required',
            // 'intJumlahKebutuhan' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'txtItemCode.required' => 'Item code harus diisi',
            // 'dtmTanggalKebutuhan.required' => 'Tanggal kebutuhan harus diisi',
            // 'intJumlahKebutuhan.required' => 'Jumlah Kebutuhan harus diisi',
            // 'intJumlahKebutuhan.numeric' => 'Jumlah kebutuhan harus angka'
        ];
    }
}
