<?php

namespace App\Http\Resources;

use App\Models\EmploymentDetail;
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
            'employment' => EmploymentDetailResource::make($this->whenLoaded('employment')),
        ];
    }
}
