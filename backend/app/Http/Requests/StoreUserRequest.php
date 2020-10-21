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
            'first_name' => ['required','min:2','max:20'],
            'last_name' => ['required','min:2','max:20'],
            'gender' => ['required',Rule::in(['M', 'F'])],
            'birthdate' => ['required','date'],
            'address' => 'required',
            'shipping_address' => 'required',
            'email' => ['nullable', Rule::unique('users')->whereNull('deleted_at')],
            'password' => 'nullable|min:8',
        ];
    }
}
