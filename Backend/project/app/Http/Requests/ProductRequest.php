<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:50',
            'condition' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'image' => 'required',
            'description' => 'required|max:100',

        ];
    }

    public function messages(){
        return [
            'name.required' => "Please fill up the name field",
            'name.max' => "name should be less than 50 characters",
            'condition.required' => "Please fill up the condition field",
            'category.required' => "Please fill up the category field",
            'quantity.required' => "Please fill up the quantity field",
            'price.required' => "Please fill up the price field",
            'discount.required' => "Please fill up the discount field",
            'image.required' => "Please fill up the image field",
            'description.required' => "Please fill up the description field",
            'description.max' => "description should be less than 100 characters",

        ];
    }
}
