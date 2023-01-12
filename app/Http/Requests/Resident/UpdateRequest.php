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
            'gender' => ['required'],
            'bdate' => ['required'],
            'age' => ['required'],
            'religion' => ['nullable'],
            'marital_status' => ['required'],
            'pwd_type' => ['nullable'],
            'is_voter' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Fullname is required',
            'gender.required' => 'Gender is required',
            'bdate.required' => 'Birthdate is required',
            'age.required' => 'Age is required',
            'marital_status.required' => 'Religion is required',
        ];
    }
}
