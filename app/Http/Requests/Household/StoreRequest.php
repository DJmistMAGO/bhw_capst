<?php

namespace App\Http\Requests\Household;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'household_no' => ['required'],
            'purok' => ['required'],
            'total_fam' => ['required'],
            'swara' => ['required'],
            'salt' => ['required'],
            'herbal' => ['required'],
            'grb_disposal' => ['required'],
            'housing_status' => ['required'],
            'water_source' => ['required'],
            'fam_planning' => ['required'],
            'env_sanitation' => ['required'],
            'electrification' => ['required'],
            'animal_owned' => ['required'],
            'vehicle' => ['required'],
            'fullname' => ['nullable', 'array'],
            'fullname.*' => ['nullable'],
            'gender' => ['nullable', 'array'],
            'gender.*' => ['nullable'],
            'bdate' => ['nullable', 'array'],
            'bdate.*' => ['nullable'],
            'age' => ['nullable', 'array'],
            'age.*' => ['nullable'],
            'religion' => ['nullable', 'array'],
            'religion.*' => ['nullable'],
            'marital_status' => ['nullable', 'array'],
            'marital_status.*' => ['nullable'],
            'pwd_type' => ['nullable', 'array'],
            'pwd_type.*' => ['nullable'],
            'is_voter' => ['required', 'array'],
            'is_voter.*' => ['required'],
            // 'memberId' => ['nullable'],
        ];
    }
}
