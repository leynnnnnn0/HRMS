<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmploymentDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'joiningDate' => $this->joiningDate,
            'department' => $this->department,
            'position' => $this->position,
            'team' => $this->team,
            'ratePerHour' => $this->ratePerHour
        ];
    }
}
