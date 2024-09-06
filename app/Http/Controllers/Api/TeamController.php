<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __invoke(Request $request)
    {
        $teams = Team::where('department_id', $request->departmentId)->get();
        return TeamResource::collection($teams);
    }
}
