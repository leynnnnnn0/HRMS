<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
      'department_id',
      'name'
    ];

    protected $with = ['department'];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employmentDetails()
    {
        return $this->hasMany(EmploymentDetail::class);
    }

}
