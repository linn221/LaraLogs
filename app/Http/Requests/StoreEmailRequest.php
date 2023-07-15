<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email-address' => 'required|email|unique:emails,address'
            //
        ];
    }

    // public function messages()
    // {
    //         // $status  = 'You already have an active subscription. No need to subscribe twice. in case you have canceled subscription, you can subscribe back by clicking the re-subscribe link in our email. thanks';
        
    // }
}
