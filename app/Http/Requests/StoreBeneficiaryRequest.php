<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeneficiaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
      //return in_array(auth()->user()->role, ['admin', 'master']);
      return auth()->check() && in_array(auth()->user()->role, ['admin', 'master']);
        //return auth()->check() && in_array(auth()->user()->role, ['admin', 'master']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        
         // ✅ Beneficiary Table
         'beneficiary.name' => 'required|string',
         'beneficiary.father_name' => 'required|string',
         'beneficiary.grandfather_name' => 'nullable|string',
         'beneficiary.lastname' => 'required|string',
         'beneficiary.date_of_birth' => 'nullable|date_format:Y-m-d',
         'beneficiary.mothers_name' => 'nullable|string',
         'beneficiary.social_status' => 'nullable|string',
         'beneficiary.family_situation' => 'nullable|string',
         'beneficiary.health_status' => 'nullable|string',
         'beneficiary.number_place_of_registration' => 'nullable|string',
         'beneficiary.nationality' => 'nullable|string',
         'beneficiary.doctrine' => 'nullable|string',
         'beneficiary.guarantor' => 'nullable|string',
         'beneficiary.political_affiliation' => 'nullable|string',
         'beneficiary.lineage' => 'nullable|string',
         'beneficiary.academic_level' => 'nullable|string',
         'beneficiary.blood_type' => 'nullable|string',
         'beneficiary.religious_commitment' => 'nullable|string',
         //'beneficiary.phone_number' => 'required|string|unique:beneficiaries,phone_number' .$this->route('beneficiary'),
         'beneficiary.phone_number' => [
            'required',
            'string',
            Rule::unique('beneficiaries', 'phone_number')->ignore($this->route('id')),
        ],
         'beneficiary.second_phone' => 'nullable|string',
         'beneficiary.family_status' => 'nullable|string|max:255',
         'beneficiary.comments' => 'nullable|string|max:255',

         // ✅ Work Table
         'work.job_type' => 'nullable|string|max:255',
         'work.contract_type' => 'nullable|string|max:255',
         'work.monthly_income' => 'nullable|numeric',

         // ✅ Housing Table
         'housing.city' => 'nullable|string|max:255',
         'housing.street' => 'nullable|string|max:255',
         'housing.building' => 'nullable|string|max:255',
         'housing.nature_of_housing' => 'nullable|string|max:255',

         // ✅ Properties Table
         'properties' => 'array',
         'properties.*.property_type' => 'nullable|string|max:255',
         'properties.*.property_value' => 'nullable|numeric',

         // ✅ Wives Table
         'wives' => 'array',
         'wives.*.full_name' => 'nullable|string|max:255',
         'wives.*.place_of_birth' => 'nullable|string|max:255',
         'wives.*.date_of_birth' => 'nullable|date_format:Y-m-d',
         'wives.*.religious_commitment' => 'nullable|string',
         'wives.*.doctrine' => 'nullable|string',
         'wives.*.lineage' => 'nullable|string',
         'wives.*.academic_level' => 'nullable|string',
         'wives.*.type_of_work' => 'nullable|string',
         'wives.*.monthly_income' => 'nullable|numeric',
         'wives.*.health_status' => 'nullable|string',
         'wives.*.guarantor' => 'nullable|string',
         'wives.*.blood_type' => 'nullable|string',
         'wives.*.property_type' => 'nullable|string|max:255',
         'wives.*.property_value' => 'nullable|numeric',

         // ✅ Children Table
         'children' => 'array',
         'children.*.name' => 'nullable|string|max:255',
         'children.*.place_of_birth' => 'nullable|string|max:255',
         'children.*.date_of_birth' => 'nullable|date_format:Y-m-d',
         'children.*.religious_commitment' => 'nullable|string',
         'children.*.sex' => 'nullable|string',
         'children.*.resident_in_house' => 'nullable|string',
         'children.*.academic_level' => 'nullable|string',
         'children.*.continues_studying' => 'nullable|string',
         'children.*.yearly_installment' => 'nullable|numeric',
         'children.*.type_of_work' => 'nullable|string',
         'children.*.monthly_income' => 'nullable|numeric',
         'children.*.monthly_contribution' => 'nullable|numeric',
         'children.*.health_status' => 'nullable|string',
         'children.*.guarantor' => 'nullable|string',
         'children.*.blood_type' => 'nullable|string',


        ];
    }
    public function messages()
    {
        return [
            'beneficiary.name.required' => 'الاسم مطلوب',
            'beneficiary.father_name.required' => 'اسم الأب مطلوب',
            'beneficiary.lastname.required' => 'الشهرة مطلوبة',
            'beneficiary.phone_number.required' => 'رقم الهاتف مطلوب',
            'beneficiary.phone_number.unique' => 'رقم الهاتف مسجل مسبقاً',
            'work.monthly_income.numeric' => 'الدخل الشهري يجب أن يكون رقماً',
            'wives.*.monthly_income.numeric' => 'دخل الزوجة يجب أن يكون رقماً',
            'properties.*.property_value.numeric' => 'قيمة الممتلك يجب أن يكون رقماً',
            'children.*.yearly_installment.numeric' => 'القسط السنوي يجب أن يكون رقماً',
            'children.*.monthly_income.numeric' => 'دخل الطفل الشهري يجب أن يكون رقماً',
            'children.*.monthly_contribution.numeric' => 'مساهمة الطفل الشهرية يجب أن تكون رقماً',
        ];
    }
}
