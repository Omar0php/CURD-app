<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|max:20|regex:/(^([a-zA-z]+)(\d+)?$)/u|unique:products,name,except,id',
            'price' => 'required|regex:/(^([0-9]+)(\d+)?$)/u',
            'details' => 'required|alpha_num',
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'you must write product name',
        'name.regex' => 'the name must be a litters',
        'price.required' => 'you must write product price',
        'price.regex' => 'the price must be a numbers ',
        'details.required' => 'you must write product details'
    ];
}
}
