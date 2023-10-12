<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            //
            'contact_name' => ['required'],
            'contact_email' => ['required', 'unique:customers,contact_email,' . $this->customer->id],
            'contact_phone_number' => ['required'],
            'contact_address' => ['required'],
            'status' => ['required'],
        ];
    }
}