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

    public function employeeDetails()
    {
        return $this->hasManyThrough(
            EmploymentDetail::class,        // Final related model
            Team::class,// Intermediate model
        );
    }
}
