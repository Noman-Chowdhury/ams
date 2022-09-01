<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id'=>['required'],
            'status' => ['required', 'in:present,absent'],
            'date'=> ['required']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id'=>2,
            'date'=>Carbon::now()
        ]);
    }
}