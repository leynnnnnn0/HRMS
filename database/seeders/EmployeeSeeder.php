<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmploymentDetail;
use App\Models\Position;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // We want to create an employee and after creating one we want to associate an employment details to it
        Employee::factory(10)
            ->has(EmploymentDetail::factory()->state(function (array $attributes, Employee $employee) {
                return [
                    'team_id' => Team::inRandomOrder()->first()->id,
                    'position_id' => Position::inRandomOrder()->first()->id,
                ];
            }), 'employmentDetails')
            ->create();

    }
}
