<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmploymentDetail>
 */
class EmploymentDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'joiningDate' => $this->faker->date(),
            'ratePerHour' => $this->faker->randomFloat(2, 10, 20),
            'accessEmail' => $this->faker->email(),
            'accessPassword' => $this->faker->password(),
        ];
    }
}


