<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'sometimes',
            'email' => 'sometimes|email',
            'password' => 'sometimes',
            'password_confirmation' => 'sometimes|same:password',
            'address' => 'sometimes',
            'phone' => 'sometimes',
            'isAdmin' => 'sometimes',
        ];
    }
}
