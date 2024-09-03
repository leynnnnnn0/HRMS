<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'gender',
        'dateOfBirth',
        'email',
        'phoneNumber',
        'streetAddress',
        'municipality',
        'cityOrProvince',
        'postalCode'
    ];

    public function employmentDetails(){
        return $this->hasOne(EmploymentDetail::class);
    }

    public function accountAccess(){
        return $this->hasOne(EmployeeAccess::class);
    }

}
