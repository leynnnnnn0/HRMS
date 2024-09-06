<?php

namespace Database\Seeders;


use App\Enum\Departments;
use App\Models\Department;
use App\Models\Position;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Validation\Rules\Enum;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Departments::cases() as $department) {
            // When we create a department we also want to create a team that is associated to it
            $department = Department::factory()->create([
               'name' => $department->value,
            ]);

            Team::factory(3)->create([
               'department_id' => $department->id,
            ]);

            Position::factory(3)->create([
                'department_id' => $department->id,
            ]);

        }
    }
}
