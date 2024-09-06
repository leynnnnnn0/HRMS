<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __invoke(Request $request)
    {
        $positions = Position::where('department_id', $request->departmentId)->get();
        return PositionResource::collection($positions);
    }
}
