<?php

namespace App\Http\Requests\Household;

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
            'household_no' => ['required'],
            'purok' => ['required'],
            'total_fam' => ['required'],
            // 'swara' => ['required'],
            'salt' => ['required'],
            'herbal' => ['required'],
            'grb_disposal' => ['required'],
            'housing_status' => ['required'],
            'water_source' => ['required'],
            'fam_planning' => ['required'],
            'otherOption' => ['nullable'],
            'env_sanitation' => ['required'],
            'electrification' => ['required'],
            'animal_owned' => ['nullable'],
            'vehicle' => ['nullable'],
            'fullname' => ['required', 'array'],
            'fullname.*' => ['required'],
            'gender' => ['required', 'array'],
            'gender.*' => ['required'],
            'bdate' => ['required', 'array'],
            'bdate.*' => ['required'],
            'age' => ['required', 'array'],
            'age.*' => ['required'],
            'religion' => ['nullable', 'array'],
            'religion.*' => ['nullable'],
            'marital_status' => ['required', 'array'],
            'marital_status.*' => ['required'],
            'pwd_type' => ['nullable', 'array'],
            'pwd_type.*' => ['nullable'],
            'is_voter' => ['nullable', 'array'],
            'is_voter.*' => ['nullable'],
            'memberId' => ['nullable'],
            'memberId.*' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'household_no.required' => 'Household No. is required',
            'purok.required' => 'Purok is required',
            'total_fam.required' => 'Total Family is required',
            // 'swara.required' => 'Swara is required',
            'salt.required' => 'Using Iodized Salt is required',
            'herbal.required' => 'Herbal is required',
            'grb_disposal.required' => 'Garbage Disposal is required',
            'housing_status.required' => 'Housing Status is required',
            'water_source.required' => 'Water Source is required',
            'fam_planning.required' => 'Family Planning is required',
            // 'otherOption.required' => 'Other Option is required',
            'env_sanitation.required' => 'Environmental Sanitation is required',
            'electrification.required' => 'Electrification is required',
            // 'animal_owned.required' => 'Animal Owned is required',
            // 'vehicle.required' => 'Vehicle is required',
            'fullname.required' => 'Fullname is required',
            'fullname.*.required' => 'Fullname is required',
            'gender.required' => 'Gender is required',
            'gender.*.required' => 'Gender is required',
            'bdate.required' => 'Birthdate is required',
            'bdate.*.required' => 'Birthdate is required',
            'age.required' => 'Age is required',
            'age.*.required' => 'Age is required',
            'marital_status.required' => 'Religion is required',
            'marital_status.*.required' => 'Religion is required',
        ];
    }
}
