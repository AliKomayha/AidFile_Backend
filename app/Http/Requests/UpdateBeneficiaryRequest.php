<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBeneficiaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return in_array(auth()->user()->role, ['admin', 'master']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        'father_name' => 'required|string',
        'grandfather_name' => 'nullable|string',
        'lastname' => 'required|string',
        'date_of_birth' => 'required|date_format:Y-m-d',
        'mothers_name' => 'required|string',
        'social_status' => 'required|string',
        'family_situation' => 'required|string',
        'health_status' => 'required|string',
        'number_place_of_registration' => 'required|string',
        'nationality' => 'required|string',
        'doctrine' => 'nullable|string',
        'guarantor' => 'nullable|string',
        'political_affiliation' => 'nullable|string',
        'lineage' => 'nullable|string',
        'academic_level' => 'nullable|string',
        'blood_type' => 'nullable|string',
        'religious_commitment' => 'nullable|string',
        //'phone_number' => 'required|string|unique:beneficiaries',
        'phone_number' => 'required|string|unique:beneficiaries,phone_number,' . $this->route('id'),
        'second_phone' => 'nullable|string',
        ];
    }
}
