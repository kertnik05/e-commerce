<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePermissionRoleRequest extends FormRequest
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
            'permission_id' => [
                Rule::unique('permission_role')->where(function ($query) {
                    return $query->where('role_id', $this->role->id)
                        ->where('permission_id', $this->permission_id);
                })
            ]
        ];
    }
}
