<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:20',
            'last_name' => 'required|min:2|max:20',
            'gender' => 'required|min:1|max:1',
            'birthdate' => 'required|date',
            'address' => 'required',
            'shipping_address' => 'required',
            'email' => [Rule::unique('users')->whereNull('deleted_at')],
            'password' => 'min:8',
        ];
    }
}
