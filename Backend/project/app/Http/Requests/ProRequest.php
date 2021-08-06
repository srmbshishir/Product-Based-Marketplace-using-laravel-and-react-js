<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProRequest extends FormRequest
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
            'name'=> 'required|max:50',
            'email'=>'required|email|max:50|bail',
            'address'=>'required|max:255',
            'phone'=>'required',
           // 'type'=>'required',
            //'image'=>'required',
            'password'=>'required|alpha_num|min:8|max:20|bail',
            //'rpass'=>'required|same:password',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'cannot be empty.',
            'email.required' => 'provide valid email.',
            'address.required'=> 'provide your address.',
            'phone.required' => 'provide your contact number.',
            //'type.required'=> 'enter a user type.',
            //'image.required'=> 'please upload a picture',
            'password.required'=> 'minimum 8 characters for password.',
            //'rpass.required'=>'confirm password',
            //'rpass.same'=>'password must match.'
         ];
    }
}
