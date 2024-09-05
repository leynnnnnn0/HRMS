<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\StoreEmployeeAccountAccessRequest;
use App\Http\Requests\Api\StoreEmployeePersonalInformationRequest;
use App\Http\Requests\Api\StoreEmployeeProfessionalInformationRequest;
use App\Http\Resources\EmployeeResource;
use App\Imports\EmployeesImport;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
       $employee->employment()->create($professionalInformation);
       $employee->access()->create($accountAccess);

       return to_route('employees.index');
   }

   public function show(Employee $employee)
   {
       return inertia('Employee/Show', [
           'employee' => new EmployeeResource($employee)
       ]);
   }

   public function import(Request $request)
   {
       $request->validate([
          'sheet' => ['required', 'mimes:xls,xlsx,csv'],
       ]);
       $path = $request->file('sheet')->store('temp');
       try {
           Excel::import(new EmployeesImport, $path);
       }catch (Exception $e){
           return back()->withErrors($e->getMessage());
       } finally {
           Storage::delete($path);
       }
       return redirect()->route('employees.index');
   }

   public function destroy(Employee $employee)
   {
       $employee->delete();
       return redirect()->route('employees.index');
   }

   public function update(Employee $employee, Request $request)
   {
       $personalInformation = $request->validate((new StoreEmployeePersonalInformationRequest())->rules());
       $professionalInformation = $request->validate((new StoreEmployeeProfessionalInformationRequest())->rules());
       $accountAccess = $request->validate((new StoreEmployeeAccountAccessRequest())->rules());

       $employee->update($personalInformation);
       $employee->employment()->update($professionalInformation);
       $employee->access()->update($accountAccess);

       return inertia('Employee/Show', [
           'employee' => new EmployeeResource($employee)
       ]);

   }
}
