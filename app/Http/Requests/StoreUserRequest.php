<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name'=>['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['string','min:8', 'max:20','confirmed'],
            'avatar' => ['nullable', 'image'],
            'role' => ['required', 'in:admin,member']
        ];
    }
}
