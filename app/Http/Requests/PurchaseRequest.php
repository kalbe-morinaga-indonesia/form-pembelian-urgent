<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'muser_id' => 'required',
            'txtNoPurchaseRequest' => 'required',
            'dtmTanggalKebutuhan' => 'required',
            'txtFile.*' => 'mimes:png,jpg,jpeg,csv,txt,pdf,docx|max:2048',
            'txtReason' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'muser_id.required' => 'Requester name harus diisi',
            'txtNoPurchaseRequest.required' => 'No purchase request harus diisi',
            'dtmTanggalKebutuhan.required' => 'Date created harus diisi',
            'txtReason.required' => 'Reason harus diisi',
        ];
    }
}
