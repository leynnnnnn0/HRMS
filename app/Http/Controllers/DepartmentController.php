<?php

namespace App\Http\Controllers;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with(['employeeDetails.employee'])->get();
        return inertia('Department/Index', [
            'departments' => $departments
        ]);
    }

    public function show($id)
    {
        $data = Department::with([
            'employmentDetails' => function($query) {
                $query->with(['employee', 'position', 'team']);
            }
        ])->where('id', $id)->get();
        return inertia('Department/Show', [
            'data' => $data
        ]);
    }
}
