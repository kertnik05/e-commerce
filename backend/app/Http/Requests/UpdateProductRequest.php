<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'brand_id' => ['required','integer','min:1'],
            'category_id' => ['required','integer','min:1'],
            'name' => ['required','min:4'],
            'description' => ['required','min:4'],
            'image' => ['required','ends_with:jpg,jpeg,png,bmp,gif,svg,webp'],
            'price' => ['required','numeric','min:1']
        ];
    }
}
