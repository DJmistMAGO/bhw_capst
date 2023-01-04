<?php

namespace App\Http\Requests\Resident;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'fullname' => ['required'],
            // 'fullname.*' => ['nullable'],
            'gender' => ['required'],
            // 'gender.*' => ['nullable'],
            'bdate' => ['required'],
            // 'bdate.*' => ['nullable'],
            'age' => ['nullable'],
            // 'age.*' => ['nullable'],
            'religion' => ['nullable'],
            // 'religion.*' => ['nullable'],
            'marital_status' => ['required'],
            // 'marital_status.*' => ['nullable'],
            'pwd_type' => ['nullable'],
            // 'pwd_type.*' => ['nullable'],
            'is_voter' => ['required'],
            // 'is_voter.*' => ['required'],
        ];
    }
}
