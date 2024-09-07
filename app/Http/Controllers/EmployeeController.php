<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\StoreEmployeePersonalInformationRequest;
use App\Http\Requests\Api\StoreEmployeeProfessionalInformationRequest;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\EmployeeResource;
use App\Imports\EmployeesImport;
use App\Models\Department;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::query()
            ->with(['employmentDetails.team.department', 'employmentDetails.position']) // Eager load related data
            ->when(request('search'), function ($query) {
                $query->where('firstName', 'like', '%' . request('search') . '%');
            })
            ->paginate(8)
            ->through(fn($item) => [
                'id' => $item->id,
                'fullName' => ucfirst($item->firstName) . ' ' . ucfirst($item->lastName),
                'department' => $item->employmentDetails->team->department->name ?? 'N/A', // Accessing through relationships
                'position' => $item->employmentDetails->position->name ?? 'N/A',
                'team' => $item->employmentDetails->team->name ?? 'N/A',
            ]);

        return inertia('Employee/Index', [
            'employees' => $employees,
            'filters' => request()->only(['search']),
        ]);
    }

   public function create()
   {
       return inertia('Employee/Create', [
           'departments' => DepartmentResource::collection(Department::all()),
       ]);
   }

   public function store(Request $request)
   {
       $personalInformation = $request->validate((new StoreEmployeePersonalInformationRequest())->rules());
       $professionalInformation = $request->validate((new StoreEmployeeProfessionalInformationRequest())->rules());

       $employee = Employee::create($personalInformation);
       $employee->employmentDetails()->create($professionalInformation);

       return to_route('employees.index');
   }

   public function show(Employee $employee)
   {
       return inertia('Employee/Show', [
           'employee' => new EmployeeResource($employee->load(['employmentDetails.team.department', 'employmentDetails.position'])),
           'departments' => DepartmentResource::collection(Department::all()),
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

   public function update(StoreEmployeePersonalInformationRequest $employeePersonalInformationRequest, StoreEmployeeProfessionalInformationRequest $storeEmployeeProfessionalInformationRequest, Employee $employee)
   {
       $personalInformation = $employeePersonalInformationRequest->validated();
       $professionalInformation = $storeEmployeeProfessionalInformationRequest->validated();
       unset($professionalInformation['department_id']);
       $employee->update($personalInformation);
       $employee->employmentDetails()->update($professionalInformation);

       $employee->load('employmentDetails');
       return inertia('Employee/Show', [
           'employee' => new EmployeeResource($employee->load(['employmentDetails.team.department', 'employmentDetails.position'])),
           'departments' => DepartmentResource::collection(Department::all()),
       ]);

   }
}
