<?php

namespace App\Http\Requests;

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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>['string', 'max:150'],
            'email' => ['string', 'unique:users,email'],
            'password' => ['string','min:8', 'max:20'],
            'avatar' => ['nullable'],
            'role' => ['in:admin,member']
        ];
    }
}