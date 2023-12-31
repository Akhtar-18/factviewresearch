<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactDetailsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_name' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'email_address' => 'required',
            'no_prefix'=>'required'
        ];
    }
}
