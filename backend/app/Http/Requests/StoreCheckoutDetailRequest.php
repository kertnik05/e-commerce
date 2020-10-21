<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCheckoutDetailRequest extends FormRequest
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
            'checkout_id' => [
                'required',
                'integer',
                'min:1', 
                Rule::unique('checkout_details')
                    ->where('order_id', $this->order_id)
                    ->whereNull('deleted_at')
            ],
            'order_id' => [
                'required',
                'integer',
                'min:1', 
                Rule::unique('checkout_details')
                    ->where('checkout_id', $this->checkout_id)
                    ->whereNull('deleted_at')
            ],
            'price' => ['required','integer','min:1']
        ];
    }
}
