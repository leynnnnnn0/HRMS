<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\StoreEmployeeAccountAccessRequest;
use App\Http\Requests\Api\StoreEmployeePersonalInformationRequest;
use App\Http\Requests\Api\StoreEmployeeProfessionalInformationRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   public function index()
   {
       return inertia('Employee/Index', [
           'employees' => EmployeeResource::collection(Employee::all())
       ]);
   }

   public function create()
   {
       return inertia('Employee/Create');
   }

   public function store(Request $request)
   {
       $personalInformation = $request->validate((new StoreEmployeePersonalInformationRequest())->rules());
       $professionalInformation = $request->validate((new StoreEmployeeProfessionalInformationRequest())->rules());
       $accountAccess = $request->validate((new StoreEmployeeAccountAccessRequest())->rules());

       $employee = Employee::create($personalInformation);
       $employee->employmentDetails()->create($professionalInformation);
       $employee->accountAccess()->create($accountAccess);

       return inertia('Employee/Create', [
           'employee' => $employee
       ]);
   }

   public function show()
   {
       return inertia('Employee/Show');
   }
}
