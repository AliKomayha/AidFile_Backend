<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAidDistributionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
        return in_array(auth()->user()->role, ['user', 'admin', 'master']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Aid_ID' => ['required', 'exists:aids,id'],
            'Beneficiary_ID' => ['required', 'exists:beneficiaries,id'],
            'date_given' => ['required', 'date'],
            'unit_value' => ['required', 'numeric'],
            'amount' => ['required', 'numeric', 'min:0'],
        ];
    }
}
