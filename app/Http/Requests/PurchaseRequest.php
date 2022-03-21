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
            'mdepartment_id' => 'required',
            'txtNoPurchaseRequest' => 'required',
            'dtmDateCreated' => 'required',
            'dtmDateRequired' => 'required',
            'txtFile' => 'required',
            'txtFile.*' => 'mimes:png,jpg,jpeg,csv,txt,pdf,docx|max:2048',
            'txtReason' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'muser_id.required' => 'Requester name harus diisi',
            'mdepartment_id.required' => 'Department harus diisi',
            'txtNoPurchaseRequest.required' => 'No purchase request harus diisi',
            'dtmDateCreated.required' => 'Date created harus diisi',
            'dtmDateRequired.required' => 'Date required harus diisi',
            'txtFile.required' => 'File harus diisi',
            'txtReason.required' => 'Reason harus diisi',
        ];
    }
}
