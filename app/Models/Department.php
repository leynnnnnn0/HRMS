<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function employmentDetails()
    {
        return $this->hasManyThrough(EmploymentDetail::class, Team::class);
    }

    public function employees()
    {
        return $this->hasManyThrough(
            Employee::class,        // Final related model
            EmploymentDetail::class,// Intermediate model
            'team_id',              // Foreign key on EmploymentDetail linking to Team
            'id',                   // Local key on Employee (since Employee is directly linked via EmploymentDetail)
            'id',                   // Local key on Department (the primary key)
            'employee_id'           // Foreign key on EmploymentDetail linking to Employee
        );
    }

}
