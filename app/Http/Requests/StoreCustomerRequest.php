<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'main_address' => ['required'],
            'secondary_address' => [],
            'city' => ['required'],
            'state' => ['required'],
            'zip_code' => ['required'],
            'county' => ['required'],
            'phone_number' => ['required'],
            'owner_renter' => ['required'],
            'credit_rating' => ['required'],
            'home_value' => ['required'],
            'income' => ['required'],
            'age' => ['required'],
            'birth_month' => ['required'],
            // 'contact_name' => ['required'],
            // 'contact_email' => ['required', 'unique:customers,contact_email'],
            // 'contact_phone_number' => ['required'],
            // 'contact_address' => ['required'],
            'foto' => [],
            'status' => ['required'],
            'user_id' => ['required'],
        ];
    }
}
