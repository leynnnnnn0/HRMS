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

    protected $with = ['employment', 'access'];

    public function employment(){
        return $this->hasOne(EmploymentDetail::class);
    }

    public function access(){
        return $this->hasOne(EmployeeAccess::class);
    }

}
