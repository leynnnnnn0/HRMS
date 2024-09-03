<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeProfessionalInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'joiningDate' => ['required', 'date', 'date_format:Y-m-d'],
            'department' => ['required', 'string'],
            'position' => ['required', 'string'],
            'team' => ['required', 'string'],
            'ratePerHour' => ['required', 'numeric'],
        ];
    }
}
