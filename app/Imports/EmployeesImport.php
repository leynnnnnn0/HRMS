<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            DB::transaction(function () use ($row) {
                $employee = Employee::create([
                    'firstName' => $row['firstname'],
                    'middleName' => $row['middlename'],
                    'lastName' => $row['lastname'],
                    'gender' => $row['gender'],
                    'dateOfBirth' => $row['dateofbirth'],
                    'phoneNumber' => $row['phonenumber'],
                    'email' => $row['email'],
                    'streetAddress' => $row['streetaddress'],
                    'municipality' => $row['municipality'],
                    'cityOrProvince' => $row['cityorprovince'],
                    'postalCode' => $row['postalcode'],
                ]);

                $employee->employment()->create([
                    'joiningDate' => $row['joiningdate'],
                    'department' => $row['department'],
                    'position' => $row['position'],
                    'team' => $row['team'],
                    'ratePerHour' => $row['rateperhour'],
                    // Add other fields as necessary
                ]);

            });
        }
    }
}
