<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreEmployeeAccountAccessRequest;
use App\Http\Requests\Api\StoreEmployeePersonalInformationRequest;
use App\Http\Requests\Api\StoreEmployeeProfessionalInformationRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function validatePersonalInformation(StoreEmployeePersonalInformationRequest $request)
    {
        return response()->json(['success' => true]);
    }

    public function validateProfessionalInformation(StoreEmployeeProfessionalInformationRequest $request)
    {
        return response()->json(['success' => true]);
    }

    public function validateAccountAccess(StoreEmployeeAccountAccessRequest $request)
    {
        return response()->json(['success' => true]);
    }
}
