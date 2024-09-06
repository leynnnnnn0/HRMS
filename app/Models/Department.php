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
        return $this->hasManyThrough(Employee::class, EmploymentDetail::class, 'team_id', 'id', 'id', 'employee_id');
    }

}
