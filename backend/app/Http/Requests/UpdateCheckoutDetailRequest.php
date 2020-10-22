<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCheckoutDetailRequest extends FormRequest
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
                    ->ignore($this->checkout_detail)
                    ->where('order_id', $this->order_id)
                    ->whereNull('deleted_at')
            ],
            'order_id' => [
                'required',
                'integer',
                'min:1', 
                Rule::unique('checkout_details')
                    ->ignore($this->checkout_detail)
                    ->where('checkout_id', $this->checkout_id)
                    ->whereNull('deleted_at')
            ],
            'price' => ['required','numeric','min:1']
        ];
    }
}
