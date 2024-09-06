<?php

namespace App\Http\Resources;

use App\Models\Department;
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
            'department' => $this->when($this->team && $this->team->department, function () {
                return new DepartmentResource($this->team->department);
            }),
            'position' => new PositionResource($this->whenLoaded('position')),
            'team' => new TeamResource($this->whenLoaded('team')),
            'joiningDate' => $this->joiningDate,
            'ratePerHour' => $this->ratePerHour,
            'accessEmail' => $this->accessEmail,
            'accessPassword' => $this->accessPassword
        ];
    }
}
