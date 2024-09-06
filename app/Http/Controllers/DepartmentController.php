<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartmentResource;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with(['employees'])->get();
        return inertia('Department/Index', [
            'departments' => $departments
        ]);
    }
}
