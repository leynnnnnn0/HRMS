<?php

namespace App\Http\Requests\Api;

use App\Enum\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreEmployeePersonalInformationRequest extends FormRequest
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
            'firstName' => ['required', 'string', 'min:2'],
            'middleName' => ['nullable', 'string', 'min:2'],
            'lastName' => ['required', 'string', 'min:2'],
            'gender' => ['required', new Enum(Gender::class)],
            'dateOfBirth' => ['required', 'date', 'date_format:Y-m-d', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phoneNumber' => ['required', 'regex:/^09\d{9}$/'],
            'municipality' => 'required',
            'streetAddress' => 'required',
            'postalCode' => ['required', 'numeric', 'min:1000', 'max:9999'],
            'cityOrProvince' => 'required',
        ];
    }
}
