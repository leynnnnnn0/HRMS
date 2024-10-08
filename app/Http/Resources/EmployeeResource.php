<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'fullName' => ucfirst($this->firstName) . ' ' . ucfirst($this->lastName),
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'gender' => $this->gender,
            'dateOfBirth' => $this->dateOfBirth,
            'email' => $this->email,
            'phoneNumber' => $this->phoneNumber,
            'streetAddress' => $this->streetAddress,
            'municipality' => $this->municipality,
            'cityOrProvince' => $this->cityOrProvince,
            'postalCode' => $this->postalCode,
            'employmentDetails' => new EmploymentDetailResource($this->whenLoaded('employmentDetails')),
        ];
    }

    public function toFlattenedArray(Request $request): array
    {
        $array = $this->toArray($request);
        if ($this->relationLoaded('employmentDetails')) {
            $employmentDetails = $this->employmentDetails;
            $array = array_merge($array, [
                'position_id' => $employmentDetails->position->id ?? null,
                'team_id' => $employmentDetails->team->id ?? null,
                'department_id' => $employmentDetails->team->department->id ?? null,
                'joiningDate' => $employmentDetails->joiningDate,
            ]);
        }
        unset($array['employmentDetails']);
        return $array;
    }
}
