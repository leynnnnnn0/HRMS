<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\StoreEmployeeAccountAccessRequest;
use App\Http\Requests\Api\StoreEmployeePersonalInformationRequest;
use App\Http\Requests\Api\StoreEmployeeProfessionalInformationRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   public function index()
   {
       return inertia('Employee/Index');
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
       return inertia('Employee/Create', [
           'personalInformation' => $personalInformation,
           'professionalInformation' => $professionalInformation,
           'accountAccess' => $accountAccess
       ]);
   }

   public function show()
   {
       return inertia('Employee/Show');
   }
}
