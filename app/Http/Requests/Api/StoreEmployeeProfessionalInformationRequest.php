<?php

namespace App\Http\Requests\Api;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreEmployeeProfessionalInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
            'department_id' => ['required', 'string', 'exists:departments,id'],
            'position_id' => ['required', 'string', 'exists:positions,id'],
            'team_id' => ['required', 'string', 'exists:teams,id'],
            'ratePerHour' => ['required', 'numeric'],
            'accessEmail' => ['required', 'email', Rule::unique('employment_details', 'accessEmail')->ignore($this->employmentDetails['employee_id'])],
            'accessPassword' => ['required', 'string', 'min:8'],
        ];
    }
}
