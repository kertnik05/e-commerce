<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required', Rule::unique('users')->ignore($this->user)->whereNull('deleted_at')],
            'password' => ['required','min:8'],
        ];
    }
}
