<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
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

    protected $with = ['employmentDetails'];

    public function employmentDetails(){
        return $this->hasOne(EmploymentDetail::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

}
