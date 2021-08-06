<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'email|required|max:50',
            'password' => 'required|alpha_num|min:8|max:20',
        ];
    }

    public function messages(){
        return [
            'email.required' => "Please fill up the email field",
            'email.max' => "Email should be less than 50 characters",
            'password.min' => "Minimum 8 characters for password",
            'password.max' => "Password should be less than 20 characters",
            'password.required' => "Please fill up the password field"
        ];
    }
}
